<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "user_details".
 *
 * @property int $id
 * @property int $user_id
 * @property string $prefix
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $mobile_number
 * @property string $cnic
 * @property string $dob
 * @property int $gender_id
 * @property int $marital_status_id
 * @property int $religion_id
 * @property int $blood_group_id
 * @property string $birth_place
 * @property string $nationality
 * @property string $image
 * @property string $detail
 *
 * @property BloodGroup $bloodGroup
 * @property Gender $gender
 * @property MaritalStatus $maritalStatus
 * @property Religion $religion
 * @property User $user
 */
class UserDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id','user_type_id', 'first_name', 'last_name','mobile_number', 'cnic', 'dob', 'gender_id', 'marital_status_id', 'religion_id', 'birth_place', 'nationality', 'image', 'detail'], 'required'],
            [['user_id','user_type_id', 'gender_id', 'marital_status_id', 'religion_id', 'blood_group_id'], 'integer'],
            [['dob'], 'safe'],
            [['prefix', 'first_name', 'middle_name', 'last_name', 'cnic', 'birth_place', 'nationality', 'image'], 'string', 'max' => 255],
            [['blood_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => BloodGroup::className(), 'targetAttribute' => ['blood_group_id' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['marital_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaritalStatus::className(), 'targetAttribute' => ['marital_status_id' => 'id']],
            [['religion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Religion::className(), 'targetAttribute' => ['religion_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type_id' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'user_type_id' => Yii::t('app', 'User Type'),
            'prefix' => Yii::t('app', 'Prefix'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'mobile_number' => Yii::t('app', 'Mobile Number'),
            'cnic' => Yii::t('app', 'C N I C'),
            'dob' => Yii::t('app', 'D O B'),
            'gender_id' => Yii::t('app', 'Gender'),
            'marital_status_id' => Yii::t('app', 'Marital Status'),
            'religion_id' => Yii::t('app', 'Religion'),
            'blood_group_id' => Yii::t('app', 'Blood Group'),
            'birth_place' => Yii::t('app', 'Birth Place'),
            'nationality' => Yii::t('app', 'Nationality'),
            'image' => Yii::t('app', 'Image'),
            'detail' => Yii::t('app', 'Details'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBloodGroup()
    {
        return $this->hasOne(BloodGroup::className(), ['id' => 'blood_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaritalStatus()
    {
        return $this->hasOne(MaritalStatus::className(), ['id' => 'marital_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReligion()
    {
        return $this->hasOne(Religion::className(), ['id' => 'religion_id']);
    }

    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return UserDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserDetailsQuery(get_called_class());
    }
}
