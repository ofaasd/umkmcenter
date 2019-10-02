<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
/**
 * BidangController implements the CRUD actions for Bidang model.
 */
class GrafikController extends Controller
{
	
     public function init(){
        if (!empty(Yii::$app->user) && !Yii::$app->user->can("admin")) {
            //throw new ForbiddenHttpException('You are not allowed to perform this action.');
            return $this->redirect(Url::base()."/user/login");
        }
    }
	
	public function beforeAction($action) {
		$this->enableCsrfValidation = false; 
   		return parent::beforeAction($action);
	}
	public function actionIndex(){
		$usaha = (new \yii\db\Query())
                 ->select(['id','nama_usaha'])
                 ->from('usaha')
                 ->all();
        $tahun = date('Y');
        $usaha_id = 0;
        if(Yii::$app->request->post()){
        	$usaha_id = Yii::$app->request->post("usaha_id");
        	$tahun = Yii::$app->request->post("tahun");
        }
        return $this->render("index",array("usaha"=>$usaha,'tahun'=>$tahun,'usaha_id'=>$usaha_id));
	}
}

?>