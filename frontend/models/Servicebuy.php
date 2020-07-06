<?php

namespace frontend\models;

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
 * @property string $service_id_user
 * @property string $repairman_name
 * @property string $confirm
 * @property string $enable_view
 * @property string $validityduration
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
            [[], 'required'],
            [['id_service', 'id_user','enable_view','service_id_user','confirm','validityduration'], 'integer'],
            [['date','time'], 'safe'],
            [[ 'date_ir','time_ir'], 'string', 'max' => 11],
            [['mobile', 'telephon'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 500],
            [['repairman_name'], 'string', 'max' => 250],
            [['name', 'family'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_service' => 'Id Service',
            'id_user' => 'Id User',
            'mobile' => 'شماره موبایل',
            'address' => 'آدرس کامل',
            'name' => 'نام',
            'family' => 'نام خانوادگی',
            'telephon' => 'تلفن',
            'date' => 'Date',
            'date_ir' => 'تاریخ',
            'time' => 'Time ',
            'time_ir' => 'زمان ',
            'service_id_user' => 'service_id_user',
            'repairman_name' => 'تعمیرکار',
            'confirm' => 'وضعیت',
            'enable_view' => 'enable_view',
            'validityduration' => 'مدت اعتبار',
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
