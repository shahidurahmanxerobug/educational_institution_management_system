<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "addresses".
 *
 * @property int $id
 * @property int $user_id
 * @property int $address_type_id
 * @property string $address_phone
 * @property string $house_no
 * @property string $street
 * @property int $city_id
 * @property int $state_id
 * @property int $country_id
 * @property string $detail
 *
 * @property AddressType $addressType
 * @property User $user
 */
class Addresses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'addresses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'address_type_id', 'address_phone', 'house_no', 'city_id', 'state_id', 'country_id', 'detail'], 'required'],
            [['user_id', 'address_type_id', 'city_id', 'state_id', 'country_id'], 'integer'],
            [['address_phone', 'house_no', 'street', 'detail'], 'string', 'max' => 255],
            [['address_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AddressType::className(), 'targetAttribute' => ['address_type_id' => 'id']],
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
            'address_type_id' => Yii::t('app', 'Address Type ID'),
            'address_phone' => Yii::t('app', 'Address Phone'),
            'house_no' => Yii::t('app', 'House No'),
            'street' => Yii::t('app', 'Street'),
            'city_id' => Yii::t('app', 'City ID'),
            'state_id' => Yii::t('app', 'State ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'detail' => Yii::t('app', 'Detail'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddressType()
    {
        return $this->hasOne(AddressType::className(), ['id' => 'address_type_id']);
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
     * @return AddressesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressesQuery(get_called_class());
    }
}
