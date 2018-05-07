<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Documents]].
 *
 * @see Documents
 */
class DocumentsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Documents[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Documents|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
