<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Massege]].
 *
 * @see Massege
 */
class MassegeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Massege[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Massege|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
