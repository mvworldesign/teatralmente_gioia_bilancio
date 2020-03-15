<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use frontend\models\Categoria;

$n_attivita = $form->field($attivita, 'categoria_id')->dropDownList(
       ArrayHelper::map(Categoria::find()->all(), 'id', 'categoria'),
           ['prompt' => Yii::t('app', 'Seleziona la categoria')]
   )->label(Yii::t('app', 'Categoria')) ;

$n_attivita .= $form->field($attivita, 'voce')->textInput();

$n_attivita .= $form->field($attivita, 'importo')->input('number', [
    'min' => 0,
    'value' => 0,
]);

$n_attivita .= $form->field($attivita, 'data')->input('date',[
    'value' => date('Y-m-d')
]);
?>
<h3>Attività</h3>

<div id="newElement" class="newElement form-element">
    <div class="none" data-copy="add-attivita">
        <div class="wrapper"><?php echo $n_attivita; ?></div>
    </div>
    <span class="btn btn-success btn-sm btn-icon"
          data-add="add-attivita"
          data-action="click">Aggiungi attività</span>
    
    <div class="wrapper-element" data-append="add-attivita"></div>
</div>

<?php 
$this->registerCSSFile(Yii::$app->request->baseUrl.'/css/newElement.css', [
]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/newElement.js',
    [
        'depends' => [\yii\web\JqueryAsset::className()]
    ]
); 
?>