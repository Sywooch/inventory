<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductuserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เพิ่มรายชื่อ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productuser-index">

    <h1><?php Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('' . $this->title, ['create'], ['class' => 'btn btn-success glyphicon glyphicon-plus']) ?>
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
            //  'id',
            'fname',
            'lname',
            'position_name',
            'position_name1',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
