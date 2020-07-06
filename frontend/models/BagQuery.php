<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Bag]].
 *
 * @see Bag
 */
class BagQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Bag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Bag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
