<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Anggota;

/* @var $this yii\web\View */
/* @var $model app\models\peminjaman */

$this->title = $model->id;



$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'id_buku',
            'id_anggota',
            'tanggal_pinjam',
            'tanggal_kembali',
        ],
    ]) ?>


    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
