<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PassivitaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="passivita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'voce') ?>

    <?= $form->field($model, 'importo') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'bilancio_id') ?>

    <?php // echo $form->field($model, 'categoria_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
