<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\anggota */

$this->title = 'Edit Anggota : '.  $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Anggotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anggota-update">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
