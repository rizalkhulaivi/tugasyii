<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Produk; 
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Transaksi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_transaksi')->textInput() ?>

    <?= $form->field($model, 'tanggal_transaksi')->widget(DatePicker::className(),['clientOptions' => ['dateFormat' => 'yy-mm-dd']]) ?>

    <?= $form->field($model, 'id_produk')
         ->dropDownList(ArrayHelper::map(Produk::find()->all(),'id_produk','nama_produk'),
        ['prompt'=>'Pilih Makanan']) ?>

    <?= $form->field($model, 'jumlah_barang')->textInput(['type'=>'number', 'min'=>'0']) ?>

    <?= $form->field($model, 'total_transaksi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
