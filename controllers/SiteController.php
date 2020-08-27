<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleTag;
use app\models\Books;
use app\models\Category;
use app\models\Mailer;
use app\models\Questions;
use app\models\Quran;
use app\models\Subscribers;
use app\models\Tag;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller{

    public function init(){
        parent::init();
        Yii::$app->assetManager->bundles = [
            'yii\web\JqueryAsset' => false,
        ];
    }

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
        Yii::$app->view->title = "Бош саҳифа";
        $articlesForMainPage = Article::articlesForMainPage();
        $latestArticles = Article::getLatestArticles(3);


        return $this->render('index', [
            'articles'=>$latestArticles['articles'],
            'pages'=>$latestArticles['pages'],
            'articlesForMainPage'=>$articlesForMainPage,
        ]);
    }


    public function actionDownload($id){
        $book = (int)$id;
        $storagePath = Yii::getAlias('@app/downloads');
        $filename = $book.'.pdf';
        $books_name = [
            1 => 'Ҳазрати Муҳаммад (алайҳиссалом) ҳаёти',
        ];
        if(file_exists("$storagePath/$filename")){
            $model = new Books();
            $model->book_id = $book;
            $model->name = $books_name[$book];
            $model->created = date("Y-m-d");
            $model->site = 2;
            $model->insert();
            return Yii::$app->response->sendFile("$storagePath/$filename", $books_name[$id].'.pdf');
        }else{
            throw new \yii\web\NotFoundHttpException('Такого файла не существует ');
        }

    }


    public function actionActivate($subscriberId, $subscriberToken){
        $subscriber = Subscribers::find()->where(['id'=>$subscriberId, 'token'=>$subscriberToken])->one();
        if(empty($subscriber)){
            throw new NotFoundHttpException('Not found');
        }

        if($subscriber == true && $subscriber->status == 0){
            $subscriber->activate();
            Yii::$app->session->setFlash('success', 'Электрон манзилингиз муваффақиятли тасдиқланди!');
        }
        return $this->goHome();
    }


    public function actionArticle($id){
        $article = Article::getArticle($id);
        Yii::$app->view->title = $article['title'];

        return $this->render('article', compact('article'));
    }


    public function actionCategory($id){
        $category = Category::findOne($id);
        Yii::$app->view->title = $category->title;
        $subCat = Category::find()->where(['parent_id'=>$category['id']])->asArray()->all();
        if(empty($category))
            throw new HttpException(404, 'Категория топилмади!');
        $articles = Article::getArticlesByCategory($id);
        return $this->render('category', [
            'articles'=>$articles['articles'],
            'pages'=>$articles['pages'],
            'category'=> $category,
            'subCat'=> $subCat
        ]);
    }


    public function actionQuestion(){
        Yii::$app->view->title = "Савол";
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
        Yii::$app->view->title = "Манбалар";
        return $this->render('sources');
    }


    public function actionBooks(){
        Yii::$app->view->title = "Юклаш";
        return $this->render('books');
    }


    public function actionLogin(){
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
    }


    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }


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
