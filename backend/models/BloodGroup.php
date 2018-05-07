<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "blood_group".
 *
 * @property int $id
 * @property string $name
 *
 * @property UserDetails[] $userDetails
 */
class BloodGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blood_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDetails()
    {
        return $this->hasMany(UserDetails::className(), ['blood_group_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return BloodGroupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BloodGroupQuery(get_called_class());
    }
}
