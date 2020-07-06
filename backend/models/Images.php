<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use Yii\web\UploadedFile;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $name
 * @property string $alert
 * @property string $dascription
 * @property int $slide
 * @property int $indpage
 * @property int $enable_view
 * @property string $meta_key
 * @property string $meta_title
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','alert', 'dascription', 'meta_key', 'meta_title'], 'required'],
            [['slide','enable_view','indpage'], 'integer'],
            [['name','alert', 'dascription', 'meta_key', 'meta_title'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'شناسه'),
            'name' =>Yii::t('app','نام'),
            'alert' => Yii::t('app', 'عنوان'),
            'dascription' => Yii::t('app', 'توضیحات'),
            'slide' => Yii::t('app', 'نمایش در اسلایدر سایت'),
            'indpage' => Yii::t('app', 'نمایش در صفحه اصلی'),
            'enable_view'=>Yii::t('app','حذف'),
            'meta_key' => Yii::t('app', 'Meta Key'),
            'meta_title' => Yii::t('app', 'Meta Title'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ImagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ImagesQuery(get_called_class());
    }
}
