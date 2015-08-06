<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventorydetail */

$this->title = 'Update Inventorydetail: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inventorydetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventorydetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
