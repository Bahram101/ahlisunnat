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

    /**
     * {@inheritdoc}
     */
    public function rules(){
        return [
            [['introtext', 'text', 'catalog_id'], 'required'],
            [['introtext', 'text'], 'string'],
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
            'title' => 'Title',
            'introtext' => 'Introtext',
            'text' => 'Text',
            'catalog_id' => 'Catalog ID',
            'created' => 'Created',
            'modified' => 'Modified',
            'hits' => 'Hits',
            'on_main_page' => 'On Main Page',
        ];
    }
}
