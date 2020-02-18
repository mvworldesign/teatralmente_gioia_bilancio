<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bilancio */

$this->title = Yii::t('app', 'Create Bilancio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bilancios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bilancio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
