<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attivita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="attivita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'voce')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'importo')->textInput() ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'bilancio_id')->textInput() ?>

    <?= $form->field($model, 'categoria_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
