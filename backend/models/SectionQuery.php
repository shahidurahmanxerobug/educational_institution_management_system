<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Section]].
 *
 * @see Section
 */
class SectionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Section[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Section|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
