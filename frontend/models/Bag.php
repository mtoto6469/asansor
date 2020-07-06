<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bag".
 *
 * @property int $id
 * @property string $cookie_name
 * @property int $id_user
 * @property int $id_pro
 * @property int $id_fac
 * @property int $count
 * @property int $enable_view
 * @property int $enable
 * @property int $price
 * @property int $down_buy
 * @property int $face_id_user
 * @property string $date
 * @property string $date_ir
 * @property string $time
 */
class Bag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pro', 'count', 'price', 'date'], 'required'],
            [['id_user', 'id_pro','id_fac', 'count', 'enable_view', 'enable', 'price','down_buy'], 'integer'],
            [['date','time'], 'safe'],
            [['cookie_name'], 'string', 'max' => 40],
            [['date_ir'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cookie_name' => 'Cookie Name',
            'id_user' => 'Id User',
            'id_pro' => 'Id Pro',
            'id_fac' => 'شناسه فاکتور',
            'count' => 'Count',
            'enable_view' => 'Enable View',
            'enable' => 'Enable',
            'price' => 'Price',
            'down_buy' => 'down_buy',
            'face_id_user' => 'face_id_user',
            'date' => 'Date',
            'date_ir' => 'Date Ir',
            'time' => 'time',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BagQuery(get_called_class());
    }
}
