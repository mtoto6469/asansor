<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblexit]].
 *
 * @see Tblexit
 */
class TblexitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tblexit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tblexit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}