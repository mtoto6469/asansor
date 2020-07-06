<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "massege".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_pro
 * @property int $name
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
            [[  'date', 'date_ir'], 'required'],
            [['id_user', 'id_pro', 'displacementheight', 'enable_view'], 'integer'],
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
            'id' => 'ID',
            'id_user' => 'نام کاربری',
            'id_pro' => 'محصول',
            'name' => 'نام و نام خانوادگی',
            'text' => 'متن پیام',
            'welldimensions' => 'ابعاد چاه(طول*عرض)',
            'displacementheight' => 'ارتفاع جابجایی(کف اولین توقف تا آخرین توقف)',
            'Capacity' => 'ظرفیت',
            'hlfdc' => 'ارتفاع آخرین کف درب آسانسور تا سقف',
            'pit' => 'عمق چاهک',
            'date' => 'Date',
            'date_ir' => 'تاریخ',
            'enable_view' => 'Enable View',
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
