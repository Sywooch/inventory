<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บริษัทคู่ค้า';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-index">

    <h1><?php Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม' . $this->title, ['create'], ['class' => 'btn btn-success fa fa-plus']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
                'before' => ' '
            ],
        'columns' => [
            
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'code',
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
