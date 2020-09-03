<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Counter;
use yii\helpers\ArrayHelper;


class CounterSearch extends Counter{

    public function rules(){
        return [
            [['id', 'hit'], 'integer'],
            [['article_id'], 'string'],
            [['created'], 'safe'],
        ];
    }


    public function scenarios(){
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function search($params){
       //debug($params['CounterSearch']['article_id']); die();

        if($params['CounterSearch']['article_id']){

            $query = Article::find()
            ->where(['like', 'title', $params['CounterSearch']['article_id']])
                ->asArray()
                ->all();
           // debug($query); die;
            $data = [];
            if($query){

                foreach ($query as $item){

                    $counter = Counter::find()
                        ->where(['article_id'=>$item['id']])
                        ->asArray()
                        ->one();

                   // debug($counter);
                    if($counter){
                        $data[]['article_id'] = $counter['article_id'];
                    }
                }
                //die();
            }
            //debug($data); die;

        }

        $query = Counter::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'article_id' =>$data ? $data : $this->article_id,
            'hit' => $this->hit,
        ]);

        $query->andFilterWhere(['like', 'created', $this->created]);

        return $dataProvider;

    }
}
