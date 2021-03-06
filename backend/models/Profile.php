<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string $name
 * @property string $family
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $mobile
 * @property string $telephone
 * @property int $id_user
 * @property string $ostan
 * @property string $city
 * @property string $location
 * @property string $address
 * @property int $postal_code
 * @property string $date
 * @property string $date_ir
 * @property int $enable_view
 * @property string $role
 * @property int $credit
 * @property int date_credit
 * @property int account_balance
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $cred;
    public static function tableName()
    {
        return 'profile';

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'username', 'password', 'mobile', 'date'], 'required'],
            [['id_user', 'postal_code', 'enable_view', 'credit','account_balance','cred'], 'integer'],
            [['address'], 'string'],
            [['date'], 'safe'],
            [['name', 'family', 'email', 'ostan', 'city', 'role'], 'string', 'max' => 50],
            [['username', 'password'], 'string', 'max' => 150],
            [['mobile'], 'string', 'max' => 11],
            [['telephone', 'date_ir','date_credit'], 'string', 'max' => 12],
            [['location'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'نام'),
            'family' => Yii::t('app', 'نام خانوادگی'),
            'email' => Yii::t('app', 'ایمیل'),
            'username' => Yii::t('app', 'نام کاربری'),
            'password' => Yii::t('app', 'رمز'),
            'mobile' => Yii::t('app', 'موبایل'),
            'telephone' => Yii::t('app', 'تلفن'),
            'id_user' => Yii::t('app', 'Id User'),
            'ostan' => Yii::t('app', 'استان'),
            'city' => Yii::t('app', 'شهر'),
            'location' => Yii::t('app', 'Location'),
            'address' => Yii::t('app', 'ادرس'),
            'postal_code' => Yii::t('app', 'کدپستی'),
            'date' => Yii::t('app', 'Date'),
            'date_ir' => Yii::t('app', 'تاریخ'),
            'enable_view' => Yii::t('app', 'Enable View'),
            'role' => Yii::t('app', 'نقش'),
            'credit' => Yii::t('app', 'اعتبار'),
            'date_credit' => Yii::t('app', 'تاریخ اعتبار'),
            'account_balance' => Yii::t('app', 'مانده اعتبار'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfileQuery(get_called_class());
    }
}
