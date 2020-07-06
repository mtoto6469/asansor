<?php

namespace frontend\models;

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
 * @property int $id_credit
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [[ 'email', 'username', 'password', 'mobile', 'id_user'], 'required'],
            [['id_user', 'postal_code', 'enable_view', 'id_credit'], 'integer'],
            [['address'], 'string'],
            [['date'], 'safe'],
            [['name', 'family', 'email', 'ostan', 'city', 'role'], 'string', 'max' => 50],
            [['username', 'password'], 'string', 'max' => 150],
            [['mobile'], 'string', 'max' => 11],
            [['telephone', 'date_ir'], 'string', 'max' => 12],
            [['location'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'family' => 'Family',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'mobile' => 'Mobile',
            'telephone' => 'Telephone',
            'id_user' => 'Id User',
            'ostan' => 'Ostan',
            'city' => 'City',
            'location' => 'منطقه',
            'address' => 'Address',
            'postal_code' => 'کدپستی',
            'date' => 'Date',
            'date_ir' => 'Date Ir',
            'enable_view' => 'Enable View',
            'role' => 'نقش',
            'id_credit' => 'شناسه اعتبار',
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
