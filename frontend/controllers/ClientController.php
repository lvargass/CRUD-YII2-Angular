<?php

namespace frontend\controllers;

use frontend\models\Client;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use \yii\db\Query;

class ClientController extends Controller
{

    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        if ($this->request->isGet) {
            $query = Client::find()->select(['client.id','client.first_name','client.last_name','client.phone','perfil.username','address.address'])
                        ->leftJoin('perfil', 'perfil.client_id=client.id')
                        ->leftJoin('address', 'address.client_id=client.id');
            
            $clients = $query->createCommand();

            
            return $this->asJson($clients->queryAll());
        }
        return $this->asJson([
            'error' => true,
            'message'   =>  'Method not supported',
            'method'    =>  $this->request->method
        ]);
    }

    /**
     * View only one Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    public function actionView($id = 1)
    {
        if ($this->request->isGet) {
            $client = $this->findModel($id);
            $address = $client->getAddress()->all();
            $perfil = $client->getPerfil()->all();
            
    
            // return $this->asJson($client);
            return $this->asJson([
                'client'    =>  $client,
                'address'    =>  $address,
                'perfil'    =>  $perfil,
            ]);
        }
        return $this->asJson([
            'error' => true,
            'message'   =>  'Method not supported',
            'method'    =>  $this->request->method
        ]);
    }

    /**
     * Creates a new Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Client();
        $params = $this->request->post();
        
        if ($this->request->isPost && isset($params['first_name']) && isset($params['last_name']) && isset($params['phone'])) {
            // Llenando el modelo
            $model->first_name = $params['first_name'];
            $model->last_name = $params['last_name'];
            $model->phone = $params['phone'];


            if ($model->save()) {
                return $this->asJson([
                    'error' =>  false,
                    'content'   =>  $model
                ]);
                
            }
        }

        return $this->asJson([
            'error' => true,
            'message'   =>  'Method not supported',
            'method'    =>  $this->request->method
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $params = $this->request->post();
        
        if ($this->request->isPut) {
            $model->first_name = $params['first_name'];
            $model->last_name = $params['last_name'];
            $model->phone = $params['phone'];

            if ($model->save()) {
                
                return $this->asJson([
                    'error' =>  false,
                    'content'   =>  $model
                ]);
            }
        }

        return $this->asJson([
            'error' => true,
            'message'   =>  'Method not supported',
            'method'    =>  $this->request->method
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        
        if ($this->request->isDelete) {

            if ($this->findModel($id)->delete()) {
                
                return $this->asJson([
                    'error' =>  false,
                    'content'   =>  $model
                ]);
            }
        }

        return $this->asJson([
            'error' => true,
            'message'   =>  'Method not supported',
            'method'    =>  $this->request->method
        ]);
    }
    /**
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Client::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Config
    public static function allowedDomains()
    {    
        return [
            '*',                        // star allows all domains
            'localhost:4200'
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
    
            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    =>  ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Allow-Credentials' => false,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                    'Access-Control-Request-Headers' => ['*']
                ],
            ],
    
        ]);
    }

}
