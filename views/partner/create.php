<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Partner */

$this->title = 'สร้างรายการคู่ค้า';
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-create">

    <div class="panel panel-default">
        <div class="panel panel-heading">
            <div class="fa fa-file"></div> <?= Html::encode($this->title) ?>
        </div>
        <div class="panel-body">


            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </div>
</div>
