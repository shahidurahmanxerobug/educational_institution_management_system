<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[DocumentType]].
 *
 * @see DocumentType
 */
class DocumentTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DocumentType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DocumentType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
