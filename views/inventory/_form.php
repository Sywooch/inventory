<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Products;
use app\models\Productmain;
use yii\helpers\ArrayHelper;
use app\models\Category;
use mcms\cart\Cart;

$cart = new Cart();
if ($_POST) {
    $cart->update($_POST);
    Yii::$app->controller->refresh();
}
?>

<div class="inventory-form">
    <div class="panel panel-info">
        <div class="panel panel-heading">
            นำเข้าพัสดุ
        </div>
        <div class="panel panel-body">
            <?php
            $form = ActiveForm::begin([
                        'action' => 'index.php?r=inventory/add',
            ]);
            ?>
            <div class="row">
                <div class="col-md-3">
                    <?=
                    $form->field($model, 'product_id')->dropdownList(
                            ArrayHelper::map(Products::find()->all(), 'id', 'name'), [
                        'id' => 'ddl-province',
                        'prompt' => '--- เลือกข้อมูล ---',
                        'required' => ''
                    ]);
                    ?>
                </div>
                <div class="col-md-1">
                    <?= $form->field($model, 'qty')->textInput(array('equired""')) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'price')->textInput() ?>
                </div>
                <div class="col-md-3">
                    <div style="margin-top: 25px;"><?= Html::submitButton($model->isNewRecord ? 'เพิ่มข้อมูล' : '', ['class' => $model->isNewRecord ? 'btn btn-success glyphicon glyphicon-ok' : 'btn btn-primary']) ?></div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>


            <a href="index.php?r=inventory/itemdelete">ล้างข้อมูล</a>

            <?php $form = ActiveForm::begin(['id' => 'cart-form', 'options' => ['class' => 'form-horizontal'],]) ?>

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
                        <td><?php echo Html::textInput($i . '[qty]', $items['qty'], ['maxlength' => '3', 'size' => '5']); ?></td>
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
                <?php
                if ($cart->total() != '') {
                    echo Html::a('ประมาณผล', ['inventory/process_in',], ['class' => 'btn btn-primary glyphicon glyphicon-transfer']);
                }
                ?>


            </div>

        </div>
    </div>
</div>
<?php ActiveForm::end() ?>