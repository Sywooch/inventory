<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Products;
use app\models\Productmain;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\Budget;
use app\models\Partner;
use mcms\cart\Cart;
use yii\jui\DatePicker;

//use kartik\date\DatePicker;

$cart = new Cart();
if ($_POST) {
    $cart->update($_POST);
    Yii::$app->controller->refresh();
}
?>

<?php
$form = ActiveForm::begin([
            'action' => 'index.php?r=inventory/process',
        ]);
?>

<div class="panel panel-info">
    <div class="panel panel-heading">
        นำเข้าพัสดุ กรอกรายละเอียดในการส่งสินค้า
    </div>
    <div class="panel panel-body">
        <div class="row">
            <div class="col-md-3">
                <?php $count = \app\models\Inventory::find()->where(['inventory' => 'i'])->count() + 1; ?>
                <?= $form->field($model, 'id')->textInput(['value' => date('Ymd-') . $count]) ?>

            </div>
            <div class="col-md-2">
                <?=
                $form->field($model, 'd_date')->widget(DatePicker::className(), ['clientOptions' => [
                        'changeMonth' => true,
                        'changeYear' => true,],
                    'dateFormat' => 'yyyy-MM-dd',
                    'options' => [//'style' => 'width:250px;',
                        'class' => 'form-control']]);
                ?>
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'bill_no')->textInput() ?>
            </div>
            <div class="col-md-2">
                <?=
                $form->field($model, 'budget_id')->dropdownList(
                        ArrayHelper::map(Budget::find()->all(), 'id', 'name'), [
                    'id' => 'budget_id',
                    'prompt' => '--- เลือกข้อมูล ---',
                    'required' => ''
                ]);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">          
                <?=
                $form->field($model, 'partner_id')->dropdownList(
                        ArrayHelper::map(Partner::find()->all(), 'id', 'name'), [
                    'id' => 'partner_id',
                    'prompt' => '--- เลือกข้อมูล ---',
                    'required' => ''
                ]);
                ?>
            </div>
            <div class="col-md-2">

            </div>
        </div>
        <table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="table table-bordered">
            <tr>
                <th>#</th>
                <th width="700">รายการวัสดุ</th>
                <th>ราคา/หน่วย</th>
                <th>จำนวน</th>
                <th style="text-align:right">รวม</th>
                <th colspan="2"></th>

            </tr>
            <?php $i = 1; ?>
            <?php foreach ($cart->contents() as $items): ?>
                <?php echo Html::hiddenInput($i . '[rowid]', $items['rowid']) ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo Products::find()->where(['id' => $items['name']])->one()->name; ?></td>
                    <td style="text-align:right"><?php echo $cart->format_number($items['price']); ?></td>
                    <td><?php echo $items['qty']; ?></td>
                    <td style="text-align:right"><?php echo $cart->format_number($items['subtotal']); ?></td>
                    <td><?= Html::submitButton('', ['class' => 'btn btn-info glyphicon glyphicon-pencil']) ?></td>
                    <td><?= Html::a('', ['inventory/cartdel', 'id' => $items['rowid'],], ['class' => 'btn btn-danger glyphicon glyphicon-remove']) ?>

                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"> </td>
                <td class="right"><strong>Total</strong></td>
                <td colspan="3" class="right"><?php echo $cart->format_number($cart->total()); ?></td>
            </tr>
        </table>
        <div style="float: right;">
            <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Process', ['class' => $model->isNewRecord ? 'btn btn-success glyphicon glyphicon-saved' : 'btn btn-primary fa fa-check']) ?>
       
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>