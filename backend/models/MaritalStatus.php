<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "marital_status".
 *
 * @property int $id
 * @property string $name
 *
 * @property UserDetails[] $userDetails
 */
class MaritalStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marital_status';
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
        return $this->hasMany(UserDetails::className(), ['marital_status_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return MaritalStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MaritalStatusQuery(get_called_class());
    }
}
