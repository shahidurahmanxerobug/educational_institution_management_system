<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "parents".
 *
 * @property int $id
 * @property int $user_id
 * @property int $profession_id
 * @property int $income
 *
 * @property Profession $profession
 * @property User $user
 * @property Students[] $students
 */
class Parents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'profession_id', 'income'], 'required'],
            [['user_id', 'profession_id', 'income'], 'integer'],
            [['profession_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profession::className(), 'targetAttribute' => ['profession_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'profession_id' => Yii::t('app', 'Profession ID'),
            'income' => Yii::t('app', 'Income'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfession()
    {
        return $this->hasOne(Profession::className(), ['id' => 'profession_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['parents_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ParentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParentsQuery(get_called_class());
    }
}
