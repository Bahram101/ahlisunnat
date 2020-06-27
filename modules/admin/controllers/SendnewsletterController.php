<?php

namespace app\modules\admin\controllers;

use app\models\Mailer;
use app\models\Subscribers;
use app\modules\admin\models\Newsletters;
//use app\modules\admin\models\Subscribers;
use Yii;
use app\modules\admin\models\Sendnewsletter;
use app\modules\admin\models\SendnewsletterSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SendnewsletterController implements the CRUD actions for Sendnewsletter model.
 */
class SendnewsletterController extends Controller
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
     * Lists all Sendnewsletter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SendnewsletterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
//            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate(){
        $model = new Sendnewsletter();

        if(Yii::$app->request->isPost){

            $post = Yii::$app->request->post();
            $post = (object) $post['Sendnewsletter'];
            $newsletterId = $post->newsletter_id;
            var_dump($newsletterId);
            die;


            $newsletterId = $post['Sendnewsletter']['newsletter_id'];
            $categoryId = $post['Sendnewsletter']['category_id'];

            $emails = Subscribers::getSubscribers();

            $newsletter = Newsletters::changeStatusOnNewsletter($newsletterId);
            Sendnewsletter::changeStatusOnSentNewsletter($newsletterId, $categoryId);

            if(Mailer::multipleSend($categoryId, $emails, $newsletter)){
                Yii::$app->session->setFlash('success', 'Рассылка успешно отправлено!');
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }





    public function actionUpdate($id){
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sendnewsletter model.
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
     * Finds the Sendnewsletter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sendnewsletter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sendnewsletter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
