<?php
use yii\helpers\ArrayHelper;
use frontend\models\Categoria;
?>
<h3><?= Yii::t('app', 'Attività') ?></h3>

<?php foreach ($attivita as $key => $value){
    echo "<div>".$form->field($attivita, 'categoria_id')->dropDownList(
       ArrayHelper::map(Categoria::find()->all(), 'id', 'categoria'),
           ['prompt' => Yii::t('app', 'Seleziona la categoria')]
   )->label(Yii::t('app', 'Categoria'))."</div>";
   echo "<div>".$form->field($attivita, 'voce')->textInput(['value' => ''])."</div>";
}
?>