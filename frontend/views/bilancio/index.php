<?php
/**
 * Bilancio, index page
 * 
 * @author Mattia Leonardo Angelillo
 * @version 1.0
 */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BilancioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bilanci');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bilancio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php
    $index = '<div id="table-wrapper"><h2>'.Yii::t('app', 'Elenco dei bilanci').'</h2>'.
        '<h4>Cerca bilancio</h4>'.
        $this->render('_search', ['model' => $searchModel]).
        GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'data',
            'nome_bilancio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]).'</div>';
    
    $create = '<div id="table-wrapper" class="categoria-create">
        <div class="header">
            <h2>'.Yii::t('app', 'Nuovo bilancio').'</h2>
        </div>'.
            $this->render("_form", [
                "model" => $model,
                "attivita" => $attivita,
                "passivita" => $passivita,
        ]).
    '</div>' ?>
    
    <?= Tabs::widget([
        'items' => [
            [
                'label' => Yii::t('app', 'Bilanci'),
                'content' => $index,
                'options' => [
                    'id' => 'tab-index-bilancio-content'
                ],
                'active' => false,
            ],
            [
                'label' => Yii::t('app', 'Nuovo bilancio'),
                'content' => $create,
                'options' => [
                    'id' => 'tab-create-bilancio-content'
                ],
                'active' => true,
            ]
        ],
    ]);
    ?>

</div>