<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Attivita */

$this->title = Yii::t('app', 'Create Attivita');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Attivitas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attivita-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
