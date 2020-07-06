<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $place
 * @property string $startdate
 * @property string $enddate
 * @property string $karfarmaname
 * @property int $statuse
 * @property int $id_img
 * @property int $id_user
 * @property int $enable_view
 * @property int $enable
 * @property string $date
 * @property string $date_ir
 * @property string $time
 * @property string $time_ir
 * @property int $slider
 * @property int $footer
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'statuse'], 'required'],
            [['startdate', 'enddate', 'date_ir', 'time_ir'], 'string'],
            [['statuse', 'id_img', 'id_user', 'slider', 'footer','enable','enable_view'], 'integer'],
            [['date', 'time'], 'safe'],
            [['title', 'place', 'karfarmaname'], 'string', 'max' => 250],
            [['description'],'string','max'=>500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'نام پروژه'),
            'description' => Yii::t('app', 'توضیحات'),
            'place' => Yii::t('app', 'نام محل'),
            'startdate' => Yii::t('app', 'تاریخ شروع'),
            'enddate' => Yii::t('app', 'تاریخ پایان'),
            'karfarmaname' => Yii::t('app', 'نام کارفرما'),
            'statuse' => Yii::t('app', 'وضعیت پروژه'),
            'id_img' => Yii::t('app', 'Id Img'),
            'id_user' => Yii::t('app', 'Id User'),
            'enable' => Yii::t('app', 'Enable'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'date' => Yii::t('app', 'Date'),
            'date_ir' => Yii::t('app', 'تاریخ'),
            'time' => Yii::t('app', 'Time'),
            'time_ir' => Yii::t('app', 'ساعت'),
            'slider' => Yii::t('app', 'اسلایدر'),
            'footer' => Yii::t('app', 'Footer'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }
}
