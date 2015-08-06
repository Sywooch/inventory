<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Inventorydetail;
use yii\data\ActiveDataProvider;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inventories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-view">

    <div class="row">
        <div class="col-md-4">
              <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
        </div>
        <div class="col-md-2">
            <a class="btn btn-info glyphicon glyphicon-print">พิมพ์</a>
        </div>
    </div>
    <hr>
    <div class="panel panel-default">
        <div class="panel panel-heading">
            <div class="fa fa-file"></div> รายการตวจรับอเกสารเลขที่ <?= Html::encode($this->title) ?>
        </div>
        <div class="panel-body">
            วันที่ <?= Yii::$app->thaiFormatter->asDate($model->d_date, 'short'); ?>
           
             เลขที่ใบส่งของ :<?= $model->bill_no; ?> 
       
            
           

            <?php
            $dataProvider = new ActiveDataProvider([
                'query' => Inventorydetail::find()->
                        where(['inventory_id' => $model->id])->
                        orderBy('id DESC'),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            ?>



            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                     'panel' => [
            'before' => ' '
        ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                      [
                'attribute' => 'productname',
                  'width'=>'1000px',],
                    
                    'price',
                    'qty',
                  //  ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>


        </div>
    </div>
</div>
