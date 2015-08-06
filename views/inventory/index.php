<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
//use yii\jui\DatePicker;
use kartik\date\DatePicker;

$time = time();

//Model
use app\models\Products;
use app\models\Budget;
use app\models\Partner;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InventorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ระบบรับ-จ่ายวัสดุ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-index">



    <?php if (Yii::$app->session->hasFlash('alert')): ?>
        <?=
        \yii\bootstrap\Alert::widget([
            'body' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
            'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
        ])
        ?>
<?php endif; ?>
<?php // echo $this->render('_search', ['model' => $searchModel]);   ?>
    <div class="row">
        <div class="col-md-1">
            <p>
<?= Html::a('รับเข้าวัสดุ ', ['create'], ['class' => 'btn btn-success fa fa-plus']) ?>
            </p>
        </div>
        <div class="col-md-3">
            <p>
<?= Html::a('จ่ายพัสดุ', ['ream'], ['class' => 'btn btn-success fa fa-share']) ?>
            </p>
        </div>
        <div class="col-md-3">

        </div>
    </div>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'before' => ' '
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'label' => 'บริษัท',
                'format' => 'raw',
                'value' => 'partnername',
                'filter' => Html::activeDropDownList($searchModel, 'partner_id', ArrayHelper::map(Partner::find()->asArray()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => 'Select Category']),
            ],
            //  'number',
            // 'productname',
            [
                'attribute' => 'd_date',
                'width' => '300px',
                'filterType' => GridView::FILTER_DATE,
                'filterWidgetOptions' => [
                    'options' => ['placeholder' => 'Enter date ...'], //this code not giving any changes in browser
                    'type' => DatePicker::TYPE_COMPONENT_APPEND, //this give error Class 'DatePicker' not found
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ],
                ],
            ],
            [ // แสดงข้อมูลออกเป็น icon
                'attribute' => 'is_admin',
                'format' => 'html',
                'value' => function($data) {
                    return "<a href='" . Url::to('index.php?r=site/report&id='.$data->id) . "'>พิมพ์ใบสั่งซื้อ</a>";
                }
            ],
//            [
//                'label' => 'งบประมาณ',
//                'format' => 'raw',
//                'value' => 'budgetname',
//                'filter' => Html::activeDropDownList($searchModel, 'budget_id', ArrayHelper::map(Budget::find()->asArray()->all(), 'id', 'name'), ['class' => 'form-control', 'prompt' => 'Select Category']),
//            ],
            // 'productuser_id',
            // 
            // 'department_id',
            // 'bill_no',
            // 'inventory',
            // 'd_date',
            // 'date_accept',
            // 'qty',
            // 'price',
            // 'file',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
