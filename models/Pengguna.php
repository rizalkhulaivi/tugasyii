<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengguna".
 *
 * @property int $id_pengguna
 * @property string $username
 * @property string $password
 * @property string $hak_akses
 */
class Pengguna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengguna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengguna', 'username', 'password', 'hak_akses'], 'required'],
            [['id_pengguna'], 'default', 'value' => null],
            [['id_pengguna'], 'integer'],
            [['username', 'password'], 'string', 'max' => 25],
            [['hak_akses'], 'string', 'max' => 7],
            [['id_pengguna'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pengguna' => 'Id Pengguna',
            'username' => 'Username',
            'password' => 'Password',
            'hak_akses' => 'Hak Akses',
        ];
    }
}
