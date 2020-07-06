<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $dascription
 * @property string $text
 * @property string $indpage
 * @property int $statuse
 * @property int $id_img
 * @property int $id_user
 * @property int $id_postcategory
 * @property int $enable
 * @property int $enable_view
 * @property string $date
 * @property string $date_it
 * @property string $time
 * @property string $time_ir
 * @property string $link
 * @property string $mata_tag
 * @property string $mata_key
 * @property string $meta_title
 * @property string $meta_text
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'dascription', 'text',  'id_postcategory', 'mata_tag', 'mata_key', 'meta_title', 'meta_text'], 'required'],
            [['text'], 'string'],
            [['statuse', 'id_img', 'id_user', 'id_postcategory', 'enable', 'enable_view','indpage'], 'integer'],
            [['date', 'time'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['dascription'], 'string', 'max' => 500],
            [['date_it', 'time_ir'], 'string', 'max' => 11],
            [['link', 'mata_tag', 'mata_key', 'meta_title', 'meta_text'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'عنوان'),
            'dascription' => Yii::t('app', 'توضیحات'),
            'text' => Yii::t('app', 'متن کامل'),
            'indpage' => Yii::t('app', 'صفحه اصلی'),
            'statuse' => Yii::t('app', 'وضعیت'),
            'id_img' => Yii::t('app', 'Id Img'),
            'id_user' => Yii::t('app', 'کاربر'),
            'id_postcategory' => Yii::t('app', 'Id Postcategory'),
            'enable' => Yii::t('app', 'نمایش'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'date' => Yii::t('app', 'Date'),
            'date_it' => Yii::t('app', 'تاریخ'),
            'time' => Yii::t('app', 'Time'),
            'time_ir' => Yii::t('app', 'زمان'),
            'link' => Yii::t('app', 'Link'),
            'mata_tag' => Yii::t('app', 'Mata Tag'),
            'mata_key' => Yii::t('app', 'Mata Key'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_text' => Yii::t('app', 'Meta Text'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostQuery(get_called_class());
    }
}
