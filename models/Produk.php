<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk".
 *
 * @property int $id_produk
 * @property string $nama_produk
 * @property string $jenis_produk
 * @property string $harga_satuan_produk
 *
 * @property Transaksi[] $transaksis
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produk', 'nama_produk', 'jenis_produk', 'harga_satuan_produk'], 'required'],
            [['id_produk', 'harga_satuan_produk'], 'default', 'value' => null],
            [['id_produk', 'harga_satuan_produk'], 'integer'],
            [['nama_produk', 'jenis_produk'], 'string', 'max' => 50],
            [['id_produk'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produk' => 'Id Produk',
            'nama_produk' => 'Nama Produk',
            'jenis_produk' => 'Jenis Produk',
            'harga_satuan_produk' => 'Harga Satuan Produk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::className(), ['id_produk' => 'id_produk']);
    }
}
