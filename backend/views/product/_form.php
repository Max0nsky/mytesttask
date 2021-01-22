<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_group')->textInput() ?>

    <?= $form->field($model, 'Widht')->textInput() ?>

    <?= $form->field($model, 'Height')->textInput() ?>

    <?= $form->field($model, 'Length')->textInput() ?>

    <?= $form->field($model, 'Quantity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>