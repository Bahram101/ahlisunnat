<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Article;
use phpDocumentor\Reflection\Types\Null_;
use yii\web\Controller;
//use yii\db\Query;
use Yii;

class BooksController extends Controller{

    public function actionIndex($dwn_year = Null,$dwn_month = Null){
        $request = Yii::$app->request;
        $dwn_year = $request->post('dwn_year');
        $dwn_month = $request->post('dwn_month');

        if(!$dwn_year){$dwn_year = date("Y");}
        if(!$dwn_month){$dwn_month = date("n");}

        $query = "SELECT id,name, COUNT(*) AS count FROM `books` WHERE YEAR(`created`) = $dwn_year AND MONTH(`created`) = $dwn_month GROUP BY name ORDER BY `count` DESC";
        $downloads = Article::findBySql($query)->asArray()->all();

       /* $query = "SELECT article_id,article_name,ip,COUNT(*) AS count FROM `counter` WHERE YEAR(`counter_date`) = $dwn_year AND MONTH(`counter_date`) = $dwn_month GROUP BY article_name ORDER BY `count` DESC LIMIT 20";
        $counters =  Article::findBySql($query)->asArray()->all();*/

        return $this->render('index',compact('downloads'));
    }
}
