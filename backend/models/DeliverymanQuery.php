<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Deliveryman]].
 *
 * @see Deliveryman
 */
class DeliverymanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Deliveryman[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Deliveryman|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
