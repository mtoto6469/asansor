<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "factor".
 *
 * @property int $id
 * @property string $ref
 * @property int $id_user
 * @property int $price
 * @property string $description
 * @property string $date
 * @property string $date_ir
 * @property int $resive
 * @property int $visibel
 * @property int $print
 * @property int $confirm
 * @property string $telephone
 * @property int $receive_type
 * @property int $enable
 * @property int $enable_view
 * @property string $address
 * @property string $location
 * @property int $etebar
 * @property int $face_id_user
 * @property string $atu
 * @property string $time
 * @property string $time_ir
 */
class Factor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'factor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'price', 'description', 'date', 'date_ir', 'telephone', 'receive_type', 'address', 'location', 'atu', 'time', 'time_ir'], 'required'],
            [['id_user', 'price', 'resive', 'visibel', 'print', 'confirm', 'receive_type', 'enable', 'enable_view', 'etebar', 'face_id_user'], 'integer'],
            [['description'], 'string'],
            [['date', 'time'], 'safe'],
            [['ref', 'atu'], 'string', 'max' => 300],
            [['date_ir', 'time_ir'], 'string', 'max' => 10],
            [['telephone'], 'string', 'max' => 11],
            [['address'], 'string', 'max' => 500],
            [['location'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ref' => Yii::t('app', 'شماره پیگیری'),
            'id_user' => Yii::t('app', 'نام کاربر'),
            'price' => Yii::t('app', 'قیمت'),
            'description' => Yii::t('app', 'توضیحات'),
            'date' => Yii::t('app', 'Date'),
            'date_ir' => Yii::t('app', 'تاریخ'),
            'resive' => Yii::t('app', 'ارسال شده'),
            'visibel' => Yii::t('app', 'مشاهده شده'),
            'print' => Yii::t('app', 'بسته بندی شده'),
            'confirm' => Yii::t('app', 'Confirm'),
            'telephone' => Yii::t('app', 'تلفن'),
            'receive_type' => Yii::t('app', 'Receive Type'),
            'enable' => Yii::t('app', 'وضعیت فاکتور'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'address' => Yii::t('app', 'آدرس'),
            'location' => Yii::t('app', 'موقعیت'),
            'etebar' => Yii::t('app', 'اعتبار'),
            'face_id_user' => Yii::t('app', 'نام کاربری'),
            'atu' => Yii::t('app', 'Atu'),
            'time' => Yii::t('app', 'Time'),
            'time_ir' => Yii::t('app', 'زمان خرید'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return FactorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FactorQuery(get_called_class());
    }
}
