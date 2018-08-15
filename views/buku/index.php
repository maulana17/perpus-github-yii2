<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Penerbit;
use app\models\Kategori;
use app\models\Penulis;
// use app\models\Buku;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BukuSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Buku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-index">

    <h2><?= Html::encode($this->title) ?></h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Buku', ['create'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Export Word', ['buku/jadwal-pl'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Export Excel', ['buku/export-excel'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export PDF', ['site/export-pdf'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => ['style' => 'text-align:center']
            ],

            
            'nama',
            'tahun_terbit',
            [
                'attribute' => 'id_penerbit',
                'format' => 'raw',
                'filter' => Penerbit::getList(),
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function ($data) {
                    return @$data->penerbit->nama;
                }
            ],
            [
                'attribute' => 'id_kategori',
                'format' => 'raw',
                'filter' => Kategori::getList(),
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function ($data) {
                    return @$data->kategori->nama;
                }
            ],
            [
                'attribute' => 'id_penulis',
                'format' => 'raw',
                'filter' => Penulis::getList(),
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center;'],
                'value' => function ($data) {
                    return @$data->penulis->nama;
                }
            ],
            // 'sinopsis:ntext',
            [
                'label' => 'Sampul',
                'format' => ['image', ['width' => '100']],
                'value' => function ($model){
                    return ('@web/upload/sampul/'.$model->sampul);
                },
            ],

            [
                'attribute' => 'berkas',
                'format' => 'raw',
                'value' => function ($model)
                {
                    if ($model->berkas !== '') {
                        return '<a href="' . Yii::$app->request->baseUrl . '/upload/berkas/' . $model->berkas . '"><div align="center"><button class="btn btn-success glyphicon glyphicon-download-alt" type="submit"></button></div></a>';
                    }
                    else {
                        return '<div align="center"><h1>File tidak ada</h1></div>';
                    }
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center;width:80px']
            ],
        ],
    ]); ?>
</div>
