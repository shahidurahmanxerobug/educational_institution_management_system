<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "address_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Addresses[] $addresses
 */
class AddressType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address_type';
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
    public function getAddresses()
    {
        return $this->hasMany(Addresses::className(), ['address_type_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AddressTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressTypeQuery(get_called_class());
    }
}
