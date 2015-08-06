<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Inventory */

$this->title = 'รับเข้า';
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="inventory-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
