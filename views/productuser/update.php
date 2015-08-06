<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Productuser */

$this->title = 'Update: ' . ' ' . $model->fname.'-'.$model->lname;
$this->params['breadcrumbs'][] = ['label' => 'Productusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fname.'-'.$model->lname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productuser-update">
    <div class="panel panel-default">
        <div class="panel panel-heading">
            <div class="fa fa-pencil-square-o"></div> <?= Html::encode($this->title) ?>
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
