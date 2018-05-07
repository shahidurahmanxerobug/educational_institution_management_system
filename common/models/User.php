<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\db\Expression;
use yii\db\Query;
use backend\models\UserDetails;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 *
 * @property Addresses[] $addresses
 * @property Class[] $classes
 * @property Class[] $classes0
 * @property Documents[] $documents
 * @property Documents[] $documents0
 * @property Documents[] $documents1
 * @property Parents[] $parents
 * @property Section[] $sections
 * @property Section[] $sections0
 * @property Students[] $students
 * @property Teachers[] $teachers
 * @property UserDetails[] $userDetails
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface {

    const STATUS_DELETED = 2;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public $password_repeat;
    public $password;
    public $verifyCode;
    public $reCaptcha;
    public $type;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED, self::STATUS_INACTIVE]],
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'created_by'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            ['password_hash', 'string', 'min' => 6],
            [['password_reset_token'], 'unique'],
            ['username', 'unique', 'message' => 'Username has already been taken.'],
            ['email', 'unique', 'message' => 'Email has already been registered.'],
            ['email', 'email'],
            [['password', 'password_repeat'], 'required','on'=>'password'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => \Yii::t('app', "Passwords don't match"), 'on' => 'password'],
            ['password', 'string', 'min' => 6],
            //    [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'on' => 'signup'],
            //    ['password', 'required', 'on' => 'update'],
        ];
    }

    public function getStatusHTML() {
        $class = 'status active';
        $text = 'Active';
        if ($this->status == 0) {
            $class = 'status inactive';
            $text = 'Inactive';
        }
        return "<span class='$class'>$text</span>";
    }

    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'type' => Yii::t('app', 'User Type'),
            'password' => Yii::t('app', 'New Password'),
            'password_repeat' => Yii::t('app', 'Repeat Password'),
        ];
    }

    public function getFullName()
    {
        return $this->userDetail->first_name .' '. $this->userDetail->middle_name .' '. $this->userDetail->last_name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses() {
        return $this->hasMany(Addresses::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments() {
        return $this->hasMany(Documents::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParents() {
        return $this->hasMany(Parents::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents() {
        return $this->hasMany(Students::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers() {
        return $this->hasMany(Teachers::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDetails() {
        return $this->hasMany(UserDetails::className(), ['user_id' => 'id']);
    }
    // One User Details
    public function getUserDetail() {
        return $this->hasOne(UserDetails::className(), ['user_id' => 'id']);
    }

    public function getUserTypeHTML() {
        $text = $this->userDetail->userType->name;
        $userTypeId = $this->userDetail->user_type_id;
        if ($userTypeId == 1) {
            $class = 'label label-default';
        } elseif ($userTypeId == 2) {
            $class = 'label label-danger';
        } elseif ($userTypeId == 3) {
            $class = 'label label-warning';
        } elseif ($userTypeId == 4) {
            $class = 'label label-success';
        } elseif ($userTypeId == 5) {
            $class = 'label label-info';
        } elseif ($userTypeId == 6) {
            $class = 'label label-primary';
        }
        return "<span style='font-size:1.3em' class='$class'>$text</span>";
    }

    public static function findIdentity($id) {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        if (strpos($username, '@') !== false) {
            $user = static::findOne(['email' => $username, 'status' => self::STATUS_ACTIVE]);
        } else {
            //Otherwise we search using the username
            $user = static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
        }
        return $user;
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

}
