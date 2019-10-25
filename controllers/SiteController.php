<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\Url;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (empty(Yii::$app->user->id)) {
            //throw new ForbiddenHttpException('You are not allowed to perform this action.');
            return $this->redirect(Url::base()."/user/login");
        }
        $omset = (new \yii\db\Query())
                 ->select("sum(omset)")
                 ->from("omset")
                 ->scalar();
        $umkm = (new \yii\db\Query())
                 ->select("count(*)")
                 ->from("usaha")
                 ->scalar();
        $mentor = (new \yii\db\Query())
                 ->select("count(*)")
                 ->from("mentor")
                 ->scalar();
        $program = (new \yii\db\Query())
                 ->select("count(*)")
                 ->from("program")
                 ->scalar();
        $grafik = Yii::$app->db->createCommand("SELECT (select (sum(omset)) from omset where omset.bulan = o.bulan) as jumlah_bulan, bulan FROM `omset` o group by bulan")->queryAll();
        $pie = Yii::$app->db->createCommand("select (select count(*) from usaha where usaha.wilayah_id = w.id) as jumlah_wilayah, nama_kota from wilayah w")->queryAll();
        return $this->render('index',array(
            'omset'=>$omset,
            'umkm'=>$umkm,
            'mentor'=>$mentor,
            'program'=>$program,
            'grafik'=>$grafik,
            'pie'=>$pie,
        ));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        $this->layout = "login";
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
