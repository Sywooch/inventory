<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Budget */

$this->title = 'เพิ่มแหล่งจ่ายเงิน';
$this->params['breadcrumbs'][] = ['label' => 'Budgets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-create">

    <div class="panel panel-default">
        <div class="panel panel-heading">
            <div class="fa fa-file"></div> <?= Html::encode($this->title) ?>
        </div>
        <div class="panel-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
    </div>