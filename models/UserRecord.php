<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $password
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserRecord extends \yii\db\ActiveRecord implements IdentityInterface
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
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            // [['created_at', 'updated_at'], 'integer'],
            [['username', 'password', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            // 'created_at' => 'Created At',
            // 'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert)
    {
        $return = parent::beforeSave($insert);
        if ($this->isNewRecord) {
            $this->auth_key = Yii::$app->security->generateRandomString($length=255);
        }
        $this->password = Yii::$app->security->generatePasswordHash($this->password);
        return $return;
    }

    public function getId()
    {
        return $this->user_id;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
}
