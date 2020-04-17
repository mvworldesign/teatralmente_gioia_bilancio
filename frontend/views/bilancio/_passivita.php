<?php
if(!$passivita->id) require_once '_passivita1.php';
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