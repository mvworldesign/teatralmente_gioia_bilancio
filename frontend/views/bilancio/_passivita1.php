<?php
use yii\helpers\ArrayHelper;
use frontend\models\Categoria;

$n_passivita = $form->field($passivita, 'categoria_id')->dropDownList(
       ArrayHelper::map(Categoria::find()->all(), 'id', 'categoria'),
           ['prompt' => Yii::t('app', 'Seleziona la categoria')]
   )->label(Yii::t('app', 'Categoria')) ;

$n_passivita .= $form->field($passivita, 'voce')->textInput();

$n_passivita .= $form->field($passivita, 'importo')->input('number', [
    'min' => 0,
    'value' => 0,
]);

$n_passivita .= $form->field($passivita, 'data')->input('date',[
    'value' => date('Y-m-d')
]);