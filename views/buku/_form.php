<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Penerbit;
use app\models\Penulis;
use app\models\Kategori;
// use limion\jqueryfileupload\JQueryFileUpload;


// use yii\bootstrap\ActiveForm;
// use app\models\User;
// use app\models\Country;
// use Webpatser\Countries\CountriesFacade as Countries;

/* @var $this yii\web\View */
/* @var $model app\models\buku */
/* @var $form yii\widgets\ActiveForm */
// $countries=Country::orderBy('id_penulis')->all();
// $listData=ArrayHelper::map($countries,'id_penulis', 'nama');
?>

<div class="buku-form">

    <!-- <div class="box-header">
        <h3 class="box-title">
            Form Buku
        </h3>
    </div> -->
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_terbit')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'id_penerbit')->widget(Select2::classname(), [
            'data' =>  Penerbit::getList(),
            'options' => [
              'placeholder' => '- Pilih Penerbit -',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

   <?= $form->field($model, 'id_penulis')->widget(Select2::classname(),
    [
        'data' => Penulis::getList(),
        'options' => [
            'placeholder' => '- Pilih Penulis -',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'id_kategori')->widget(Select2::classname(),
    [
        'data' => Kategori::getList(),
        'options' => [
            'placeholder' => '- Pilih Kategori -',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    

    <?= $form->field($model, 'sinopsis')->textarea(['rows' => 7]) ?>
    <?= $form->field($model, 'sampul')->fileInput() ?>
    <?= $form->field($model, 'berkas')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
