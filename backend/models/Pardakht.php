<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pardakht".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_fac
 * @property int $price
 * @property int $endnamber
 * @property string $paygiri
 * @property string $admin_description
 * @property int $enable
 * @property int $enable_view
 * @property int $approve
 * @property string $date_u
 */
class Pardakht extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pardakht';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_fac', 'price', 'endnamber', 'paygiri', 'admin_description', 'date_u'], 'required'],
            [['id_user', 'id_fac', 'price', 'endnamber', 'enable','enable_view', 'approve'], 'integer'],
            [['paygiri'], 'string', 'max' => 20],
            [['admin_description'], 'string', 'max' => 500],
            [['date_u'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'id_fac' => Yii::t('app', 'شماره فاکتور'),
            'price' => Yii::t('app', 'قیمت'),
            'endnamber' => Yii::t('app', ' چهار رقم آخر کارت'),
            'paygiri' => Yii::t('app', 'پیکیری'),
            'admin_description' => Yii::t('app', 'توضیحات مدیر'),
            'enable' => Yii::t('app', 'Enable'),
            'enable_view' => Yii::t('app', 'Enable_view'),
            'approve' => Yii::t('app', 'Approve'),
            'date_u' => Yii::t('app', 'Date U'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PardakhtQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PardakhtQuery(get_called_class());
    }
}
