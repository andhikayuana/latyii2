<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "address".
 *
 * @property integer $address_id
 * @property string $purpose
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $street
 * @property string $building
 * @property string $apartment
 * @property string $reciever_name
 * @property string $postal_code
 * @property integer $customer_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Customer $customer
 */
class AddressRecord extends \yii\db\ActiveRecord
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
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purpose', 'country', 'state', 'city', 'street', 'building', 'apartment', 'reciever_name', 'postal_code', 'customer_id'], 'required'],
            [['customer_id', 'created_at', 'updated_at'], 'integer'],
            [['purpose', 'country', 'state', 'city', 'street', 'building', 'apartment', 'reciever_name', 'postal_code'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerRecord::className(), 'targetAttribute' => ['customer_id' => 'customer_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'purpose' => 'Purpose',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'street' => 'Street',
            'building' => 'Building',
            'apartment' => 'Apartment',
            'reciever_name' => 'Reciever Name',
            'postal_code' => 'Postal Code',
            'customer_id' => 'Customer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(CustomerRecord::className(), ['customer_id' => 'customer_id']);
    }
}
