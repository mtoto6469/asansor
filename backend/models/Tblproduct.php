<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tblproduct".
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property string $description
 * @property string $brand
 * @property int $id_category
 * @property int $id_img
 * @property int $enable
 * @property int $enable_view
 * @property int $cont
 * @property int $exit
 * @property int $emtiaz
 * @property string $meta_title
 * @property string $meta_tag
 * @property string $meta_text
 * @property string $meta_key
 */
class Tblproduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblproduct';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'description', 'brand', 'id_category', 'cont', 'meta_title', 'meta_tag', 'meta_text', 'meta_key'], 'required'],
            [['price', 'id_category','id_img', 'enable', 'enable_view', 'cont', 'exit', 'emtiaz'], 'integer'],
            [['title'], 'string', 'max' => 300],
            [['description', 'meta_title', 'meta_tag', 'meta_text', 'meta_key'], 'string', 'max' => 250],
            [['brand'], 'string', 'max' => 252],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'نام محصول'),
            'price' => Yii::t('app', 'قیمت محصول'),
            'description' => Yii::t('app', 'توضیحات'),
            'brand' => Yii::t('app', 'برند'),
            'id_category' => Yii::t('app', 'دسته بندی محصول'),
            'id_img' => Yii::t('app', 'عکس محصول'),
            'enable' => Yii::t('app', 'وضعیت محصول'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'cont' => Yii::t('app', 'تعداد محصول'),
            'exit' => Yii::t('app', 'تعداد خروجی(فروش رفته)'),
            'emtiaz' => Yii::t('app', 'امتیاز'),
            'meta_title' => Yii::t('app', 'Meta Title'),
            'meta_tag' => Yii::t('app', 'Meta Tag'),
            'meta_text' => Yii::t('app', 'Meta Text'),
            'meta_key' => Yii::t('app', 'Meta Key'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return TblproductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TblproductQuery(get_called_class());
    }
}
