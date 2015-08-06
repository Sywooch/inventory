<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//Model
use app\models\Budget;
use mcms\cart\Cart;
use yii\helpers\Url;

$cart = new Cart();

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="panel panel-primary">
    <div class="panel panel-heading">
        <span class="glyphicon glyphicon-list"></span>&nbsp;รายการวัสดุ
    </div>
    <div class="panel panel-body">
        <?php
        $form = ActiveForm::begin(
                        [
                            'action' => 'index.php?r=inventory/add',
                            'options' => [
                                'class' => 'userform'
                            ]
                        ]
        );
        ?>
        <?=
        $form->field($model, 'budget_id')->dropdownList(
                ArrayHelper::map(Budget::find()->all(), 'id', 'name'), [
            'id' => 'ddl-province',
            'prompt' => 'เลือกหมวดหมู่',
            'required' => ''
        ]);
        ?>

        <?= $form->field($model, 'price')->textInput() ?>

        <?= $form->field($model, 'qty')->textInput() ?>



        <input type="submit" value="เพิ่มข้อมูล" class="btn btn-primary">

        <?php
        ActiveForm::end();
        ?>



        </form>

        <hr>


        <table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="table table-bordered">
            <tr>
                <th width="1">#</th>
                <th width="800">รายการวัสดุ</th>
                <th style="text-align:right">ราคา</th>
                <th>จำนวน</th>
                <th style="text-align:right">รวมทั้งหมด</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($cart->contents() as $items): ?>
                <?php echo Html::hiddenInput($i . '[rowid]', $items['rowid']) ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                        <?php echo $items['name']; ?>
                    </td>
                    <td style="text-align:right"><?php echo $cart->format_number($items['price']); ?></td>
                    <td><?php echo Html::textInput($i . '[qty]', $items['qty'], ['maxlength' => '3', 'size' => '5']); ?></td>
                    <td style="text-align:right">$<?php echo $cart->format_number($items['subtotal']); ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td colspan="2"> </td>
                <td class="right"><strong>รวม</strong></td>
                <td class="right">$<?php echo $cart->format_number($cart->total()); ?></td>
            </tr>

        </table>
    </div>
</div>