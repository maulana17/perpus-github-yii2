<?php

use app\models\Anggota;
use app\models\Kategori;
use app\models\Peminjaman;
use app\models\Penulis;
use app\models\Buku;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\helpers\Url;
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
    <div class="col-sm-6">
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

    <div class="col-sm-6">
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
    <div class="col-sm-6">
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
                                'data' => Anggota::getGrafikListAnggota(),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
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
                                'data' => Penulis::getGrafikListPenulis(),
                            ],
                        ],
                    ],
                ]);?>
            </div>
        </div>
    </div>
</div>

