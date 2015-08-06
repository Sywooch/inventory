<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'productuser_id')->textInput() ?>

    <?= $form->field($model, 'partner_id')->textInput() ?>

    <?= $form->field($model, 'department_id')->textInput() ?>

    <?= $form->field($model, 'bill_no')->textInput() ?>

    <?= $form->field($model, 'inventory')->dropDownList([ 'i' => 'I', 'o' => 'O', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div class="inventory-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'number')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'date_accept')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'bill_no')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?=
            $form->field($model, 'budget_id')->dropdownList(
                    ArrayHelper::map(Budget::find()->all(), 'id', 'name'), [
                'id' => 'ddl-province',
                'prompt' => 'เลือกหมวดหมู่',
                'required' => ''
            ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'partner_id')->textInput() ?>
        </div>
        <div class="col-md-3">

        </div>
        <div class="col-md-3">

        </div>
        <div class="col-md-3">

        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>