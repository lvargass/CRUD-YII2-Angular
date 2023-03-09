<?php

namespace frontend\controllers;

use frontend\models\Perfil;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PerfilController extends Controller
{
    public $enableCsrfValidation = false;
    
    public function actionIndex()
    {
        if ($this->request->isGet) {
            $perfil = Perfil::find()->all();
    
            return $this->asJson($perfil);
        }
        return $this->asJson([
            'error' => true,
            'message'   =>  'Method not supported'
        ]);
    }

    public function actionView($id = 1)
    {
        if ($this->request->isGet) {
            $perfil = $this->findModel($id);
            
    
            // return $this->asJson($client);
            return $this->asJson($perfil);
        }
        return $this->asJson([
            'error' => true,
            'message'   =>  'Method not supported'
        ]);
    }

    public function actionCreate($id)
    {
        $model = new Perfil();
        $params = $this->request->post();
        
        if ($this->request->isPost && isset($id) && isset($params['username']) && isset($params['password'])) {
            // Llenando el modelo
            $model->client_id = $id;
            $model->username = $params['username'];
            $model->password = $params['password'];

            if ($model->save()) {
                
                return $this->asJson([
                    'error' =>  false,
                    'content'   =>  $model
                ]);
            }
            return $this->asJson([
                'error' => true,
                'message'   =>  'Error Saved'
            ]);
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
            $model->username = $params['username'];
            $model->password = $params['password'];

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



    // Funcion que se encarga de buscar un modelo por client_id
    protected function findModel($id)
    {
        if (($model = Perfil::findOne(['client_id' => $id])) !== null) {
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
