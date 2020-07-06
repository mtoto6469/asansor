<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "deliveryman".
 *
 * @property int $id
 * @property int $id_devliveryman
 * @property int $price
 * @property int $endnamber
 * @property int $id_factor
 * @property int $confirm
 * @property string $user_tel
 * @property string $user_address
 * @property string $enable_view
 * @property string $approve
 * @property string $date
 * @property string $date_ir
 */
class Deliveryman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deliveryman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_devliveryman'], 'required'],
            [['id_devliveryman', 'id_factor', 'confirm','enable_view','endnamber','price','approve'], 'integer'],
            [['user_address'], 'string'],
            [['date'], 'safe'],
            [['user_tel'], 'string', 'max' => 11],
            [['date_ir'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_devliveryman' => Yii::t('app', 'شناسه کاربری'),
            'id_factor' => Yii::t('app', 'شماره فاکتور'),
            'confirm' => Yii::t('app', 'وضعیت'),
            'endnamber' => Yii::t('app', '5رفم آخر ref'),
            'approve' => Yii::t('app', 'تایید'),
            'price' => Yii::t('app', 'قیمت'),
            'enable_view' => Yii::t('app', 'وضعیت'),
            'user_tel' => Yii::t('app', 'تلفن مشتری'),
            'user_address' => Yii::t('app', 'آدرس مشتری'),
            'date' => Yii::t('app', 'Date'),
            'date_ir' => Yii::t('app', 'تاریخ'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return DeliverymanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DeliverymanQuery(get_called_class());
    }
}
