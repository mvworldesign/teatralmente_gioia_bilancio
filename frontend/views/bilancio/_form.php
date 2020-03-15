<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bilancio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bilancio-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'data')->textInput() ?>-->
    
    <?= $form->field($model, 'data')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'it',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => [
            'class' =>'form-control', 
            'autocomplete'=>'off',
        ],
    ]) ?>

    <?= $form->field($model, 'nome_bilancio')->textInput(['maxlength' => true]) ?>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?= $this->render("_attivita.php", [
                    'attivita' => $attivita,
                    'form' => $form
                ]); ?>
            </div>
            
            <div class="col-lg-6">
                <?= $this->render("_passivita.php", [
                    "passivita" => $passivita,
                    'form' => $form
                ]); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
