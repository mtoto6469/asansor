<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tbladdress]].
 *
 * @see Tbladdress
 */
class TbladdressQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tbladdress[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tbladdress|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
