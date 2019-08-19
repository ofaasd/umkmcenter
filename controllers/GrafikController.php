<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BidangController implements the CRUD actions for Bidang model.
 */
class GrafikController extends Controller
{
	public function actionIndex(){
		$usaha = (new \yii\db\Query())
                 ->select(['id','nama_usaha'])
                 ->from('usaha')
                 ->all();
        return $this->render("index",array("usaha"=>$usaha));
	}
}

?>