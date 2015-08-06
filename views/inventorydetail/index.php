<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InventorydetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventorydetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventorydetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inventorydetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'inventory_id',
            'product_id',
            'price',
            'qty',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
