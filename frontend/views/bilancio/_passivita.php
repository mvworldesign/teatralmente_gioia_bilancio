<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
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
?>
<h3>Passività</h3>

<div id="newElement" class="newElement form-element">
    <div class="none" data-copy="add-passivita">
        <div class="wrapper"><?php echo $n_passivita; ?></div>
    </div>
    <span class="btn btn-success btn-sm btn-icon"
          data-add="add-passivita"
          data-action="click">Aggiungi Passività</span>
    
    <div class="wrapper-element" data-append="add-passivita"></div>
</div>

<?php 
$this->registerCSSFile(Yii::$app->request->baseUrl.'/css/newElement.css', [
]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/newElement.js',
    [
        'depends' => [\yii\web\JqueryAsset::className()]
    ]
);