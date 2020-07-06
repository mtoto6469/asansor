<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "learn".
 *
 * @property int $id
 * @property string $title
 * @property string $dascription
 * @property string $text
 * @property int $id_img
 * @property int $id_user
 * @property int $id_postcategory
 * @property int $enable
 * @property int $enable_view
 * @property string $date
 * @property string $date_ir
 * @property string $time
 * @property string $time_ir
 */
class Learn extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'learn';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text', 'date', 'date_ir', 'time', 'time_ir'], 'required'],
            [['text'], 'string'],
            [['id_img', 'id_user', 'id_postcategory', 'enable', 'enable_view'], 'integer'],
            [['date', 'time'], 'safe'],
            [['title'], 'string', 'max' => 250],
            [['dascription'], 'string', 'max' => 500],
            [['date_ir', 'time_ir'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'عنوان مقاله آموزشی'),
            'dascription' => Yii::t('app', 'توضیحات'),
            'text' => Yii::t('app', 'متن مقاله'),
            'id_img' => Yii::t('app', 'عکس'),
            'id_user' => Yii::t('app', 'کد کاربر'),
            'id_postcategory' => Yii::t('app', 'Id Postcategory'),
            'enable' => Yii::t('app', 'Enable'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'date' => Yii::t('app', 'تاریخ'),
            'date_ir' => Yii::t('app', 'Date Ir'),
            'time' => Yii::t('app', 'زمان'),
            'time_ir' => Yii::t('app', 'Time Ir'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return LearnQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LearnQuery(get_called_class());
    }
}
