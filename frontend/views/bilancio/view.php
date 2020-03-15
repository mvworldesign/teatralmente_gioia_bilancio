<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bilancio */

$this->title = $model->nome_bilancio;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bilancios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bilancio-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h3><?= Yii::t('app', 'Attività') ?></h3>
                
                <?php
                foreach ($attivita as $k_att => $val_att){
                    echo Html::a(Yii::t('app', 'Delete'), ['attivita/delete', 
                                                            'id' => $val_att->id, 
                                                            'redirect' => 'bilancio/view',
                                                            'redirectId' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]);
                    echo "<div class='title'><strong>{$val_att->voce}</strong></div>";
                    echo "<div class='importo'>{$val_att->importo}</div>";
                    echo "<div class='data'>{$val_att->data}</div>";
                    echo "<div class'categoria'>{$val_att->categoria_id}</div>";
                    
                    echo "<hr />";
                }
                ?>
            </div>
            
            <div class="col-lg-6">
                <h3><?= Yii::t('app', 'Passività') ?></h3>
                
                <?php
                foreach ($passivita as $k_pass => $val_pass){
                    echo Html::a(Yii::t('app', 'Delete'), ['passivita/delete', 
                                                            'id' => $val_pass->id, 
                                                            'redirect' => 'bilancio/view',
                                                            'redirectId' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]);
                    echo "<div class='title'><strong>{$val_pass->voce}</strong></div>";
                    echo "<div class='importo'>{$val_pass->importo}</div>";
                    echo "<div class='data'>{$val_pass->data}</div>";
                    echo "<div class'categoria'>{$val_pass->categoria_id}</div>";
                    
                    echo "<hr />";
                }
                ?>
            </div>
        </div>
    </div>
    
    <!--<p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'data',
            'nome_bilancio',
        ],
    ]) ?>-->

</div>
