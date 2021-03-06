<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\buku */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-view">

     <h2><?= Html::encode($this->title) ?></h2>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'label' => 'Nama (Tahun)',
                'attribute' => 'nama',
                'value' => $model->nama.  ' ('.$model->tahun_terbit.'),'
            ],
            [
                'attribute' => 'tahun_terbit',
                'value' => $model->tahun_terbit. ' MASEHI',
            ],


            'id_penerbit',
            'id_kategori',
            'id_penulis',
            'sinopsis:ntext',
            [
                'label' => 'Sampul',
                'format' => ['image', ['width' => '100']],
                'value' => function ($model){
                    return ('@web/upload/sampul/'.$model->sampul);
                },
                ],

                // [
                // 'label' => 'Berkas',
                // 'format' => ['image', ['width' => '50']],
                // 'value' => function ($model){
                //     return ('@web/upload/berkas/'.$model->berkas);
                // },
                // ],

                [
                'attribute' => 'berkas',
                'format' => 'raw',
                'value' => function ($model)
                {
                    if ($model->berkas !== '') {
                        return '<a href="' . Yii::$app->request->baseUrl . '/upload/berkas/' . $model->berkas . '"><div align="left"><button class="btn btn-success glyphicon glyphicon-download-alt" type="submit"></button></div></a>';
                    }
                    else {
                        return '<div align="center"><h1>File tidak ada</h1></div>';
                    }
                },
            ],


        ],
    ]) ?>

    <p>
        <!-- <?= Html::a('Baca Buku', ['detail', 'id' => $model->id], ['class' => 'btn btn-success']) ?> -->
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<br>
<br>
<br>
<br>

<p>


<?php

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-view">

     <center><h1><?= Html::encode($this->title) ?></h1></center>

     <br>

     <br>

     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => '<center> Sampul </center>',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center'],
                'format' => ['image', ['width' => '300', 'align' => 'center']],
                'value' => function ($model){
                    return ('@web/upload/sampul/'.$model->sampul);
                },
            ],
            ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'headerOptions' => ['style' => 'text-align:center'],
                // 'contentOptions' => ['style' => 'text-align:center'],
                'attribute' => 'tahun_terbit',
                'value' => $model->tahun_terbit. ' MASEHI',
            ],
            
            ],
    ]) ?>

    </p>

</div>
