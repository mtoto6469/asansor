<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "servicebuy".
 *
 * @property int $id
 * @property int $id_service
 * @property int $id_user
 * @property string $mobile
 * @property string $address
 * @property string $name
 * @property string $family
 * @property string $telephon
 * @property string $date
 * @property string $date_ir
 * @property string $time
 * @property string $time_ir
 * @property int $service_id_user
 * @property string $repairman_name
 * @property int $confirm
 * @property int $enable_view
 * @property int $validityduration
 */
class Servicebuy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicebuy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_service', 'mobile', 'address', 'name', 'family', 'telephon', 'date', 'date_ir', 'time', 'time_ir','validityduration'], 'required'],
            [['id_service', 'id_user', 'service_id_user', 'confirm', 'enable_view','validityduration'], 'integer'],
            [['date', 'time'], 'safe'],
            [['mobile', 'telephon'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 500],
            [['name', 'family'], 'string', 'max' => 50],
            [['date_ir', 'time_ir'], 'string', 'max' => 11],
            [['repairman_name'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_service' => Yii::t('app', 'کد سرویس'),
            'id_user' => Yii::t('app', 'Id User'),
            'mobile' => Yii::t('app', 'موبایل'),
            'address' => Yii::t('app', 'آدرس'),
            'name' => Yii::t('app', 'نام'),
            'family' => Yii::t('app', 'نام خانوادگی'),
            'telephon' => Yii::t('app', 'تلفن'),
            'date' => Yii::t('app', 'Date'),
            'date_ir' => Yii::t('app', 'تاریخ'),
            'time' => Yii::t('app', 'Time'),
            'time_ir' => Yii::t('app', 'زمان'),
            'service_id_user' => Yii::t('app', 'Service Id User'),
            'repairman_name' => Yii::t('app', 'نام تعمیرکار'),
            'confirm' => Yii::t('app', 'Confirm'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'validityduration' => Yii::t('app', 'مدت اعتبار'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ServicebuyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicebuyQuery(get_called_class());
    }
}
