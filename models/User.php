<?php

namespace app\models;
use app\models\Pengguna; //mendifinisikan model class Login yang telah kita generate tadi.

class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    public $id_pengguna;
    public $username;
    public $password;
    public $hak_akses;
    public $authKey;
    public $accessToken;
    public $role;


    public static function findIdentity($id_pengguna)
    {
        //mencari user login berdasarkan IDnya dan hanya dicari 1.
        $user = Pengguna::findOne($id_pengguna);
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        //mencari user login berdasarkan accessToken dan hanya dicari 1.
        $user = Login::find()->where(['accessToken'=>$token])->one();
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public static function findByUsername($username)
    {
        //mencari user login berdasarkan username dan hanya dicari 1.
        $user = Pengguna::find()->where(['username'=>$username])->one();
        if(count($user)){
            return new static($user);
        }
        return null;
    }

    public function getId()
    {
        return $this->id_pengguna;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}

?>
