<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $introtext
 * @property string $text
 * @property int $catalog_id
 * @property string $created
 * @property string|null $modified
 * @property int $hits
 * @property int $on_main_page
 */
class Article extends \yii\db\ActiveRecord{
    /**
     * {@inheritdoc}
     */
    public static function tableName(){
        return 'article';
    }


    public function getCategory(){
        return $this->hasOne(Category::class, ['id'=>'catalog_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules(){
        return [
            [['introtext', 'fulltext', 'catalog_id'], 'required'],
            [['introtext', 'fulltext','keywords'], 'string'],
            [['catalog_id', 'hits', 'on_main_page'], 'integer'],
            [['created', 'modified'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'introtext' => 'Описание',
            'fulltext' => 'Текст',
            'keywords' => 'Ключевые слова',
            'catalog_id' => 'Категория',
            'created' => 'Дата',
            'modified' => 'Modified',
            'hits' => 'Просмотр',
            'on_main_page' => 'Главная страница',
        ];
    }

    public static function getArticleTitle($text){
        $article = self::find()->andFilterWhere(['like', 'title', $text])->all();

    }


}
