<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "massege".
 *
 * @property int $id
 * @property int $name
 * @property int $id_user
 * @property int $id_pro
 * @property int $tell
 * @property int $adrress
 * @property string $text
 * @property string $welldimensions
 * @property int $displacementheight
 * @property string $Capacity
 * @property string $hlfdc
 * @property string $pit
 * @property string $date
 * @property string $date_ir
 * @property int $enable_view
 * @property int $confirm
 */
class Massege extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'massege';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'text', 'date', 'date_ir'], 'required'],
            [['id_user', 'id_pro', 'displacementheight', 'enable_view','confirm'], 'integer'],
            [['text'], 'string'],
            [['date'], 'safe'],
            [['welldimensions', 'Capacity', 'hlfdc', 'pit'], 'string', 'max' => 50],
            [['adrress'], 'string', 'max' => 500],
            [['name'], 'string', 'max' => 100],
            [['date_ir'], 'string', 'max' => 11],
            [['tell'], 'string', 'max' => 54],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
//            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'نام کاربری'),
            'name' => Yii::t('app', 'نام و نام خانوادگی'),
            'id_pro' => Yii::t('app', 'نام محصول'),
            'tell' => Yii::t('app', 'تلفن'),
            'adeerss' => Yii::t('app', 'آدرس'),
            'text' => Yii::t('app', 'متن'),
            'welldimensions' => Yii::t('app', 'ابعاد چاه(طول*عرض)'),
            'displacementheight' => Yii::t('app', 'ارتفاع جابجایی'),
            'Capacity' => Yii::t('app', 'ظرفیت'),
            'hlfdc' => Yii::t('app', 'ارتفاع آخرین کف درب آسانسور تا سقف'),
            'pit' => Yii::t('app', 'عمق چاهک'),
            'date' => Yii::t('app', 'Date'),
            'date_ir' => Yii::t('app', 'تاریخ'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'confirm' => Yii::t('app', 'Confirm'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return MassegeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MassegeQuery(get_called_class());
    }
}
