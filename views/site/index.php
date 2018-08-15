<?php

use app\models\Anggota;
use app\models\Kategori;
use app\models\Peminjaman;
use app\models\Penulis;
use app\models\Buku;
// use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
/* @var $this yii\web\View */

$this->title = 'perpustakaan';
?>
<div class="row">

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
            <div class="inner">
                <p>Jumlah Buku</p>

                <h3><?= Yii::$app->formatter->asInteger(Anggota::getCount()); ?></h3>
            </div>
            <div class="icon">
               <center> <i class="fa fa-book" style="size: 300px height:100px"> </i> </center>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <p>Jumlah Anggota</p>

                <h3><?= Yii::$app->formatter->asInteger(Anggota::getCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <p>Jumlah Peminjaman</p>

                <h3><?= Yii::$app->formatter->asInteger(Peminjaman::getCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-handshake-o"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <p>Jumlah Penulis</p>

                <h3><?= Yii::$app->formatter->asInteger(Penulis::getCount()); ?></h3>
            </div>
            <div class="icon">
                <i class="fa fa-pencil"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>




<br>
<br>
<div class="row">
    <div class="col-sm-6 col-xs-6 col-xs-6">
        <div class="box box-primary" style="height: 500px;">
            <div class="box-header with-border">
                <h3 class="box-title">Buku</h3>
            </div>
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'Buku'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'bar',
                                'name' => 'buku',
                                'data' => Buku::getGrafikListBuku(),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xs-6">
        <div class="box box-primary" style="height: 500px;">
            <div class="box-header with-border">
                <h3 class="box-title">Peminjaman</h3>
            </div>
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'Peminjaman'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'bar',
                                'name' => 'Peminjaman',
                                'data' => Peminjaman::getGrafikListPeminjaman(),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-6 col-xs-6">
        <div class="box box-primary" style="height: 500px;">
            <div class="box-header with-border">
                <h3 class="box-title">Anggota</h3>
            </div>
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'Anggota'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'bar',
                                'name' => 'anggota',
                                // 'data' => Anggota::getGrafikListAnggota(),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xs-6">
        <div class="box box-primary" style="height: 500px;">
            <div class="box-header with-border">
                <h3 class="box-title">Penulis</h3>
            </div>
            <div class="box-body">
                <?=Highcharts::widget([
                    'options' => [
                        'credits' => false,
                        'title' => ['text' => 'Kategori'],
                        'exporting' => ['enabled' => true],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'bar',
                                'name' => 'penulis',
                                // 'data' => Penulis::getGrafikListPenulis(),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>
    </div>

    <?php
    echo Highcharts::widget([
    'scripts' => [
        'modules/exporting',
        'themes/grid-light',
    ],
    'options' => [
        'title' => [
            'text' => 'Combination chart',
        ],
        'xAxis' => [
            'categories' => ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'],
        ],
        'labels' => [
            'items' => [
                [
                    'html' => 'Total fruit consumption',
                    'style' => [
                        'left' => '50px',
                        'top' => '18px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => [
            [
                'type' => 'column',
                'name' => 'Jane',
                'data' => [3, 2, 1, 3, 4],
            ],
            [
                'type' => 'column',
                'name' => 'John',
                'data' => [2, 3, 5, 7, 6],
            ],
            [
                'type' => 'column',
                'name' => 'Joe',
                'data' => [4, 3, 3, 9, 0],
            ],
            [
                'type' => 'spline',
                'name' => 'Average',
                'data' => [3, 2.67, 3, 6.33, 3.33],
                'marker' => [
                    'lineWidth' => 2,
                    'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
                    'fillColor' => 'white',
                ],
            ],
            [
                'type' => 'pie',
                'name' => 'Total consumption',
                'data' => [
                    [
                        'name' => 'Jane',
                        'y' => 13,
                        'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
                    ],
                    [
                        'name' => 'John',
                        'y' => 23,
                        'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
                    ],
                    [
                        'name' => 'Joe',
                        'y' => 19,
                        'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
                    ],
                ],
                'center' => [100, 80],
                'size' => 100,
                'showInLegend' => false,
                'dataLabels' => [
                    'enabled' => false,
                ],
            ],
        ],
    ]
]);
    ?>
</div>

