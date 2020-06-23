<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\Mailer;
use app\models\Questions;
use app\models\Quran;
use app\models\Subscribers;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller{

    /*public function init(){
        parent::init();
        Yii::$app->assetManager->bundles = [
            'yii\bootstrap\BootstrapPluginAsset' => false,
            'yii\bootstrap\BootstrapAsset' => false,
            'yii\web\JqueryAsset' => false,
        ];
    }*/

    public function behaviors(){
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


    public function actions(){
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


    public function actionIndex(){
        $articlesForMainPage = Article::articlesForMainPage();
        $query = Article::find();
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $articles = $query->offset($pages->offset)->limit($pages->limit)->orderBy(['id' => SORT_DESC])->asArray()->with('category')->all();

        $subscriber = new Subscribers();
        if ($subscriber->load(Yii::$app->request->post()) && $subscriber->addSubscriber() && Mailer::send(Mailer::TYPE_SUBSCRIPTION, $subscriber)) {
            Yii::$app->session->setFlash('success', 'Проверьте почту!');
        }

        return $this->render('index', compact('articles', 'pages', 'articlesForMainPage','subscriber'));
    }


    public function actionActivate($subscriberId, $subscriberToken){
        $subscriber = Subscribers::find()->where(['id'=>$subscriberId, 'token'=>$subscriberToken])->one();

        if($subscriber){
            $subscriber->activate();
            Yii::$app->session->setFlash('success', 'email муваффақиятли тасдиқланди!');
        }else{
            Yii::$app->session->setFlash('error', 'email тасдиқланмади!');
        }
        return $this->goHome();
    }



    public function actionArticle($id){
        $id = (int)$id;
        $article = Article::find()->where(['id'=>$id])->asArray()->one();

        return $this->render('article', compact('article'));
    }


    public function actionCategory($id){
        $id = (int)$id;
        $query = Article::find()->where(['catalog_id'=>$id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $articles = $query->offset($pages->offset)->limit($pages->limit)->orderBy(['id' => SORT_DESC])->asArray()->with('category')->all();

        return $this->render('category', compact('articles', 'pages'));
    }


    public function actionQuestion(){
        $model = new Questions();
        if ($model->load(Yii::$app->request->post())) {
            $model->sendQuestion();
            Yii::$app->session->setFlash('success', 'Саволингиз муваффақиятли юборилди!');
            return $this->redirect(['/questions']);
        }

        return $this->render('questions', [
            'model' => $model,
        ]);
    }



    public function actionSources(){
        return $this->render('sources');
    }


    public function actionBooks(){
        return $this->render('books');
    }


    /*public function actionLogin(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }*/


    /*public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }*/


    /*public function actionContact(){
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }*/



}
