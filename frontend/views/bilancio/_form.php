<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bilancio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bilancio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'nome_bilancio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
