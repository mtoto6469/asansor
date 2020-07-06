<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Priceforelevator]].
 *
 * @see Priceforelevator
 */
class PriceForElevatorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Priceforelevator[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Priceforelevator|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
