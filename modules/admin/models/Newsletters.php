<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "newsletters".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitile
 * @property string $content
 * @property string $created_at
 */
class Newsletters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newsletters';
    }

    public function getCategory(){
        return $this->hasOne(Category::class, ['id'=>'category_id']);
    }


    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['category_id', 'status'], 'integer'],
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
            'category_id' => 'Категория',
            'status' => 'Статус',
            'created_at' => 'Дата',
        ];
    }


    public static function changeStatusOnNewsletter($newsletterId){
        $newsletter = self::findOne($newsletterId);
        $newsletter->status = 1;
        $newsletter->save();
        return $newsletter;
    }


}
