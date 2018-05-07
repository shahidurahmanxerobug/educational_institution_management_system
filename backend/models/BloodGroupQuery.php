<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[BloodGroup]].
 *
 * @see BloodGroup
 */
class BloodGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BloodGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BloodGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
