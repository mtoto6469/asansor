<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property int $floornamber
 * @property int $numderstop
 * @property int $duration
 * @property int $enable
 * @property int $enable_view
 * @property int $price
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['floornamber', 'numderstop', 'duration', 'price'], 'required'],
            [['floornamber', 'numderstop', 'duration', 'enable', 'enable_view', 'price'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'floornamber' => 'Floornamber',
            'numderstop' => 'Numderstop',
            'duration' => 'Duration',
            'enable' => 'Enable',
            'enable_view' => 'Enable View',
            'price' => 'Price',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiceQuery(get_called_class());
    }
}
