<?php
/**
 * Created by PhpStorm.
 * User: Bahram
 * Date: 31.08.2020
 * Time: 15:44
 */

namespace app\modules\admin\models;


use yii\base\Model;
use yii\helpers\ArrayHelper;

class Counter extends \yii\db\ActiveRecord{

    public static function tableName(){
        return 'counter';
    }

    public function getArticle(){
        return $this->hasOne(Article::class, ['id' => 'article_id']);
    }


    public function rules(){
        return [
            [['article_id'], 'required'],
            [['article_id','hit'], 'integer'],
            [['created'], 'string'],
        ];
    }


    public function attributeLabels(){
        return [
            'id' => 'ID',
            'article_id' => 'Article',
            'hit' => 'Hit',
            'created' => 'Date',
        ];
    }


    public static function addHit($id){
        $counter = Counter::find()
            ->where(['article_id'=>$id])
            ->andWhere(['created' => date('Yn')])
            ->one();
        if($counter){
            $counter->hit += 1;
            $counter->save();
        }else{
            $model = new Counter();
            $model->article_id = $id;
            $model->hit += 1;
            $model->created = date('Yn');
            $model->save();
        }
    }


    public static function Monthes(){
        return $months = [
            '1'=>'Январь', 'Февраль', 'Март', 'Апрель',
            'Май', 'Июнь', 'Июль', 'Август',
            'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
        ];
    }


    public static function RDate($data){
        if($data){
            $data = (int)$data;
            $data = str_split($data, 4);
            $months = self::Monthes();
            return $data[0] .' / '. $months[$data[1]];
        }else{
            return '';
        }
    }

    public static function getArticleTitle($id){
        echo $id;
    }

    /*public static function Dates(){
        $months = self::Monthes();
        $i = 1;
        $date = [];
        while ($i <= 12) {
            $date[$i]['name'] = date('Y').' / '.$months[$i];
            $date[$i]['id'] = date('Y').$i;
            $i++;
        }
        //return $date;
       return ArrayHelper::map($date,'id','name');
    }*/

    /* public function getParent(){
       return $this->hasOne(Article::class, ['id' => 'article_id']);
   }


   public function getParentName(){
       $parent = $this->parent;

       return $parent ? $parent->title : '';
   }*/
}