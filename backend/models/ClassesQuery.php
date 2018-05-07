<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Classes]].
 *
 * @see Classes
 */
class ClassesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Classes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Classes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
