<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\Productmain;
use app\models\Unit;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?php Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มรายการใหม่', ['create'], ['class' => 'btn btn-success fa fa-plus']) ?>
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
            // 'id',
            [
                'label' => 'หมวดหมู่หลัก',
                'format' => 'raw',
                'value' => 'productmainname',
                'filter' => Html::activeDropDownList($searchModel, 'productmain_id', ArrayHelper::map(Productmain::find()->asArray()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => 'Select Category']),
            ],
            [
                'label' => 'หมวดหมู่รอง',
                'format' => 'raw',
                'value' => 'Categoryname',
                'filter' => Html::activeDropDownList($searchModel, 'category_id', ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => 'Select Category']),
            ],
            'sub_qty',
            [
                'label' => 'ชื่อหน่วยนับ',
                'format' => 'raw',
                'value' => 'unitname',
                'filter' => Html::activeDropDownList($searchModel, 'productmain_id', ArrayHelper::map(Unit::find()->asArray()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => 'Select Category']),
            ],
            [
                'label' => 'จำนวนคงเหลือ',
                'format' => 'raw',
                'value' => 'unitname',
                'filter' => \app\models\Inventorydetail::find()->where(['product_id'=>$dataProvider->id])->sum('qty'),
            ],
            'name',
            // 'detail:ntext',
             //'qty',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
