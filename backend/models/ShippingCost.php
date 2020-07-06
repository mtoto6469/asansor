<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shipping_cost".
 *
 * @property int $id
 * @property string $paymentCode
 * @property int $price
 */
class Shippingcost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shipping_cost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paymentCode', 'price'], 'required'],
            [['price'], 'integer'],
            [['paymentCode'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'paymentCode' => Yii::t('app', 'شناسه پرداخت'),
            'price' => Yii::t('app', 'هزینه'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ShippingcostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShippingcostQuery(get_called_class());
    }
}
