<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Passivita */

$this->title = Yii::t('app', 'Create Passivita');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Passivitas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passivita-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
