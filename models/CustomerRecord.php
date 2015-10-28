<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "customer".
 *
 * @property integer $customer_id
 * @property string $name
 * @property string $birth_date
 * @property string $notes
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Phone $phone
 */
class CustomerRecord extends \yii\db\ActiveRecord
{
    
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at','updated_at'],
                    yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required', 'message' => 'Tidak boleh kosong'],
            [['birth_date'], 'safe'],
            [['notes'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'name' => 'Name',
            'birth_date' => 'Birth Date',
            'notes' => 'Notes',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhones()
    {
        return $this->hasOne(PhoneRecord::className(), ['customer_id' => 'customer_id']);
    }

    public function getAddresses()
    {
        return $this->hasMany(AddressRecord::className(), ['customer_id' => 'customer_id']);
    }

    public function getEmails()
    {
        return $this->hasMany(EmailRecord::className(), ['customer_id' => 'customer_id']);
    }

    public static function getListCustomer()
    {
        $customerModel = self::find()->all();
        $listCustomer = ArrayHelper::map($customerModel,'customer_id','name');

        return $listCustomer;
    }
}
