<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Servicebuy]].
 *
 * @see Servicebuy
 */
class ServicebuyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Servicebuy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Servicebuy|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}