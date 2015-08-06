<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Productmain */

$this->title = 'Update Productmain: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Productmains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productmain-update">
    <div class="panel panel-default">
        <div class="panel panel-heading">
            <div class="fa fa-pencil-square-o"></div> <?= Html::encode($this->title) ?>
        </div>
        <div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
        </div>
    </div>
