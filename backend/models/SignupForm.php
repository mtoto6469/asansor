<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\debug\models\Profile;
use common\components\jdf;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $mobile;
    public $role;
    public $date;
    public $date_ir;
    public $time;
    public $time_ir;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['role', 'string', 'max' => 50],
            ['date', 'date'],
            ['date_ir', 'string', 'max' => 12],
            ['time_ir', 'date'],
            ['time', 'string', 'max' => 12],
            ['mobile', 'string'],


        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {

            return null;
        } else {

            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $auth = Yii::$app->authManager;
            $authoRole = $auth->getRole('user');
            if ($user->save()) {
                $auth->assign($authoRole, $user->id);

                $Profile = new \frontend\models\Profile();
                $Profile->email = $this->email;
                $Profile->username = $this->username;
                $Profile->password = $this->password;
                $Profile->mobile = $this->mobile;
                $Profile->id_user = $user->getId();

                if ($this->role == 'admin') {
                    $Profile->role = 'ادمین';
                } elseif ($this->role == 'repairman') {
                    $Profile->role = 'تعمیرکار';
                } elseif ($this->role == 'writer') {
                    $Profile->role = 'اپراتور';
                } elseif ($this->role == 'deliveryman') {
                    $Profile->role = 'پیک';
                } elseif ($this->role == 'user') {
                    $Profile->role = 'کاربر ساده';

                }
//            $Profile->ostan=$this->ostan;
//            $Profile->city=$this->city;
//            $Profile->location=$this->location;
//            $Profile->address=$this->address;
//            $Profile->postal_code=$this->postal_code;
//              $Profile->date=$this->date;
//              $Profile->date_ir=$this->date_ir;
                $data = new jdf();
                $Profile->date = date('Y/m/d');
                $Profile->date_ir = $data->date('Y/m/d');
//                $Profile-> = date('Y/m/d');
//                $Profile->time_ir = $data->date('h:m:s');


//            $Profile->enable_view=$this->enable_view;
//           if($Profile->role='کاربر') {}
//            $Profile->id_credit=$this->id_credit;
                if ($Profile->save()) {
                    if (isset($_SESSION['user_id'])) {
                        if ($_SESSION['user_id'] != null) {
                            $bag = Bag::find()->where(['face_id_user' => $_SESSION['user_id']])->all();
                            if ($bag != null) {
                                foreach ($bag as $b) {
                                    $b->id_user = $Profile->id_user;
                                    $b->face_id_user = null;
                                    $b->save();
                                }
                            }

                        }
                        $_SESSION['user_id'] = null;
                    }
                    return $user;
                } else {
                    var_dump($Profile->getErrors());
                    exit;
                    $user->delete();
                    $_SESSION['signup'] = 'ثبت نام شما انجام نشد';
                    return null;
                }
            } else {

                $_SESSION['signup'] = 'ثبت نام شما انجام نشد';
                return null;
            }

        }
    }
}
