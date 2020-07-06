<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Pardakht]].
 *
 * @see Pardakht
 */
class PardakhtQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Pardakht[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Pardakht|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
