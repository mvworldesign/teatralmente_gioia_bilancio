<?php
use frontend\models\Attivita;

if($action=="update"){
    $this->render('_attivita2', [
        'form' => $form,
        'attivita' => $attivita,
    ]);
}else if($action=="index"){
    $this->render('_attivita1', [
        'form' => $form,
        'attivita' => $attivita,
    ]);
}
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