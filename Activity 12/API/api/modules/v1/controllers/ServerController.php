<?php

Namespace app\api\modules\v1\controllers;

use yii\rest\ActiveController;
use app\models\Service;

class ServerController extends ActiveController
{
    public $modelClass = 'app\api\modules\v1\models\Server';

    public function actions(){
        $actions = parent::actions();
//        unset($actions['create']);
//        unset($actions['update']);
//        unset($actions['delete']);
        unset($actions['view']);
//        unset($actions['index']);
        return $actions;
    }

    public function actionView($id){
        $id_service = Service::findOne($id);
        return ['url' => (Service::findOne($id_service)->getServers()->orderBy(['random()' => SORT_DESC])->one())['URL']];
    }

}