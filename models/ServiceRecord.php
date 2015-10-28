<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "service".
 *
 * @property integer $service_id
 * @property string $name
 * @property integer $hourly_rate
 * @property integer $created_at
 * @property integer $updated_at
 */
class ServiceRecord extends \yii\db\ActiveRecord
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
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'hourly_rate'], 'required', 'message' => 'Tidak boleh kosong'],
            [['hourly_rate', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'service_id' => 'Service ID',
            'name' => 'Name',
            'hourly_rate' => 'Hourly Rate',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
