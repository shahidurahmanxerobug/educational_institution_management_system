<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Addresses]].
 *
 * @see Addresses
 */
class AddressesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Addresses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Addresses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
