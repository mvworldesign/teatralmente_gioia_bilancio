<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Gestione Categorie');
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title)?></h1>
<?php 
    $index = GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoria',
            'data_creazione',
            'ultima_modifica',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    
    $create = '<div id="table-wrapper" class="categoria-create">
    <div class="header">
        <h2>'.Yii::t('app', 'Nuova categoria').'</h2>
    </div>'.
        $this->render("_form", [
        "model" => $model,
    ]).
    
'</div>' ?>

<?= Tabs::widget([
    'items' => [
        [
            'label' => Yii::t('app', 'Categorie'),
            'content' => $index,
            'options' => [
                'id' => 'tab-index-category-content'
            ],
            'active' => true,
        ],
        [
            'label' => Yii::t('app', 'Nuova categoria'),
            'content' => $create,
            'options' => [
                'id' => 'tab-create-category-content'
            ],
            'active' => false,
        ]
    ],
]);
?>

<!--
<div class="categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Categoria'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoria',
            'data_creazione',
            'ultima_modifica',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
-->