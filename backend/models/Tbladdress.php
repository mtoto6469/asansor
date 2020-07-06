<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbladdress".
 *
 * @property int $id
 * @property string $address
 * @property string $phone
 * @property string $fax
 * @property string $mobile
 * @property string $textindex
 * @property string $abutemy
 * @property int $status
 * @property int $enable
 * @property int $enable_view
 */
class Tbladdress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbladdress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'textindex', 'abutemy','fax'], 'string'],
            [['enable', 'enable_view','status'], 'integer'],
            [['phone', 'mobile'], 'string', 'max' => 30],
            [['fax'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'address' => Yii::t('app', 'آدرس'),
            'phone' => Yii::t('app', 'تلفن'),
            'fax' => Yii::t('app', 'فکس'),
            'mobile' => Yii::t('app', 'موبایل'),
            'textindex' => Yii::t('app', 'متن مریوط یه صفحه اصلی'),
            'abutemy' => Yii::t('app', 'درباره ما'),
            'status' => Yii::t('app', 'نمایش در صفحه اصلی'),
            'enable' => Yii::t('app', 'وضعیت نمایش'),
            'enable_view' => Yii::t('app', 'Enable View'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TbladdressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TbladdressQuery(get_called_class());
    }
}
