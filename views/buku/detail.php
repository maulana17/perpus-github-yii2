<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\buku */

"<center> $this->title = $model->nama; </center>";
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
</div>
