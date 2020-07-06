<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "price_for_elevator".
 *
 * @property int $id
 * @property int $id_user
 * @property int $floorNamber
 * @property int $floorStops
 * @property string $speed
 * @property string $capacity
 * @property int $karbary
 * @property string $liftType
 * @property string $motortype
 * @property string $instalLocation
 * @property string $text
 * @property string $motor1
 * @property string $motor2
 * @property string $motor3
 * @property string $description1
 * @property string $description2
 * @property string $description3
 * @property string $description4
 * @property string $description5
 * @property string $description6
 * @property int $enable
 * @property int $enable_view
 */
class Priceforelevator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price_for_elevator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'floorNamber', 'floorStops', 'karbary', 'enable', 'enable_view'], 'integer'],
            [['floorNamber', 'floorStops'], 'required'],
            [['text'], 'string'],
            [['speed'], 'string', 'max' => 10],
            [['capacity', 'liftType', 'motortype', 'instalLocation'], 'string', 'max' => 50],
            [['motor1', 'motor2', 'motor3', 'description1', 'description2', 'description3', 'description4', 'description5', 'description6'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'floorNamber' => Yii::t('app', 'تعداد طبقه'),
            'floorStops' => Yii::t('app', 'تعداد توقف'),
            'speed' => Yii::t('app', 'سرعت'),
            'capacity' => Yii::t('app', 'ظرفیت'),
            'karbary' => Yii::t('app', 'نوع کاربری'),
            'liftType' => Yii::t('app', 'نوع آسانسور'),
            'motortype' => Yii::t('app', 'نوع موتور'),
            'instalLocation' => Yii::t('app', 'محل نصب'),
            'text' => Yii::t('app', 'Text'),
            'motor1' => Yii::t('app', 'Motor1'),
            'motor2' => Yii::t('app', 'Motor2'),
            'motor3' => Yii::t('app', 'Motor3'),
            'description1' => Yii::t('app', 'Description1'),
            'description2' => Yii::t('app', 'Description2'),
            'description3' => Yii::t('app', 'Description3'),
            'description4' => Yii::t('app', 'Description4'),
            'description5' => Yii::t('app', 'Description5'),
            'description6' => Yii::t('app', 'Description6'),
            'enable' => Yii::t('app', 'Enable'),
            'enable_view' => Yii::t('app', 'Enable View'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PriceForElevatorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PriceForElevatorQuery(get_called_class());
    }
}
