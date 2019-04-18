<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $id_transaksi
 * @property string $tanggal_transaksi
 * @property string $total_transaksi
 * @property int $jumlah_barang
 * @property int $id_produk
 *
 * @property Produk $produk
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'tanggal_transaksi', 'total_transaksi', 'jumlah_barang', 'id_produk'], 'required'],
            [['id_transaksi', 'total_transaksi', 'jumlah_barang', 'id_produk'], 'default', 'value' => null],
            [['id_transaksi', 'total_transaksi', 'jumlah_barang', 'id_produk'], 'integer'],
            [['tanggal_transaksi'], 'safe'],
            [['id_transaksi'], 'unique'],
            [['id_produk'], 'exist', 'skipOnError' => true, 'targetClass' => Produk::className(), 'targetAttribute' => ['id_produk' => 'id_produk']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi' => 'Id Transaksi',
            'tanggal_transaksi' => 'Tanggal Transaksi',
            'total_transaksi' => 'Total Transaksi',
            'jumlah_barang' => 'Jumlah Barang',
            'id_produk' => 'Nama Produk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['id_produk' => 'id_produk']);
    }
}
