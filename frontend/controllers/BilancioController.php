<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Bilancio;
use frontend\models\BilancioSearch;
use frontend\models\Attivita;
use frontend\models\Passivita;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BilancioController implements the CRUD actions for Bilancio model.
 */
class BilancioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Manage bilancio
     * 
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Bilancio();
        $attivita = new Attivita();
        $passivita = new Passivita();
        $searchModel = new BilancioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        if($model->load(Yii::$app->request->post())){
            $tmp = Yii::$app->request->post();
            
            /*echo "<pre>";
            print_r($tmp['Attivita']);
            echo "</pre>";*/
            
            echo "<br><br><br>";
            echo "<pre>";
            print_r($tmp['Passivita']);
            echo "</pre>";
            echo "<hr>";
            if($model->save()){
                if(isset($tmp['Attivita'])){
                    $tmpAtt = $this->extractFromArray($tmp['Attivita'], "categoria_id");
                    foreach ($tmpAtt as $value){
                        $attivita = $this->getAttivita($value, $model->id);
                        $attivita->save();
                    }
                }
                if(isset($tmp['Passivita'])){
                    echo "OK<br>";
                    $tmpPass = $this->extractFromArray($tmp['Passivita'], "categoria_id");
                    
                    foreach ($tmpPass as $value){
                        $passivita = $this->getPassivita($value, $model->id);
                        $passivita->save();
                    }
                }
                
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        
        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'attivita' => $attivita,
            'passivita' => $passivita
        ]);
    }
    

    /**
     * Displays a single Bilancio model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bilancio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bilancio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bilancio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bilancio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bilancio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bilancio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bilancio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    
    /**
     * Extract elements from an array
     * Array{
     *      [key1] => Array{
     *                      [0] => value 1
     *                      [1] => value 2
     *                }
     *      [key2] => Array{
     *                      [0] => value 1
     *                      [1] => value 2
     *                }
     * }
     * 
     * @param type $array Array to extract values
     * @param type $index Index to count number of elements
     * @return type
     */
    private function extractFromArray($array, $index){
        $return = array();
        $nOfEl = count($array[$index]);
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        for($i=0;$i<$nOfEl;$i ++){
            foreach ($array as $key => $value){
                $return[$i][$key] = $value[$i]; 
            }
        }
        
        return $return;
    }
    
    /**
     * 
     * @param Array $array
     * @param integer $modelId
     * @return Attivita
     */
    private function getAttivita($array, $modelId){
        $attivita = new Attivita();
        
        $attivita->categoria_id = $array['categoria_id'];
        $attivita->voce         = $array['voce'];
        $attivita->importo      = $array['importo'];
        $attivita->data         = $array['data'];
        $attivita->bilancio_id  = $modelId;
        
        return $attivita;
    }
    
    /**
     * 
     * @param Array $array
     * @param integer $modelId
     * @return Passivita
     */
    private function getPassivita($array, $modelId){
        $passivita = new Passivita();
        
        $passivita->categoria_id = $array['categoria_id'];
        $passivita->voce         = $array['voce'];
        $passivita->importo      = $array['importo'];
        $passivita->data         = $array['data'];
        $passivita->bilancio_id  = $modelId;
        
        return $passivita;
    }
}
