<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//Model
use app\models\Category;
use app\models\Unit;
use \app\models\Productmain;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?=
            $form->field($model, 'productmain_id')->dropdownList(
                    ArrayHelper::map(Productmain::find()->all(), 'id', 'name'), [
                'id' => 'ddl-province',
                'prompt' => 'เลือกหมวดหมู่',
                'required' => ''
            ]);
            ?>

        </div>
        <div class="col-md-6">
            <?=
            $form->field($model, 'category_id')->dropdownList(
                    ArrayHelper::map(Category::find()->all(), 'id', 'name'), [
                'id' => 'ddl-province',
                'prompt' => 'เลือกหมวดหมู่',
                'required' => ''
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'sub_qty')->textInput() ?>
        </div>
        <div class="col-md-2">
           
            <?=
            $form->field($model, 'unit_id')->dropdownList(
                    ArrayHelper::map(Unit::find()->all(), 'id', 'name'), [
                'id' => 'unit_id',
                'prompt' => 'เลือกหน่วยนับ',
                'required' => ''
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'qty')->textInput() ?>
        </div>
         <div class="col-md-6">
            <?= $form->field($model, 'price')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'บันทึก' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success glyphicon glyphicon-saved' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
