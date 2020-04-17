<?php
use yii\helpers\ArrayHelper;
use frontend\models\Categoria;

$n_attivita = $form->field($attivita, 'categoria_id')->dropDownList(ArrayHelper::map(Categoria::find()->all(), 'id', 'categoria'),['prompt' => Yii::t('app', 'Seleziona la categoria')])->label(Yii::t('app', 'Categoria')) ;

$n_attivita .= $form->field($attivita, 'voce')->textInput();

$n_attivita .= $form->field($attivita, 'importo')->input('number', [
    'min' => 0,
    'value' => 0,
]);

$n_attivita .= $form->field($attivita, 'data')->input('date',[
    'value' => date('Y-m-d')
]);