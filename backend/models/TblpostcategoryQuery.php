<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Tblpostcategory]].
 *
 * @see Tblpostcategory
 */
class TblpostcategoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Tblpostcategory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tblpostcategory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
