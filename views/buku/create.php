<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\buku */

$this->title = 'Tambah Buku';
$this->params['breadcrumbs'][] = ['label' => 'Bukus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buku-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
