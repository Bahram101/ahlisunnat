<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suradua".
 *
 * @property int $id
 * @property string $title
 * @property string|null $photo
 * @property string|null $audio
 * @property string $text
 */
class Suradua extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suradua';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['title', 'photo', 'audio'], 'string', 'max' => 255],
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
            'photo' => 'Photo',
            'audio' => 'Audio',
            'text' => 'Text',
        ];
    }


    public static function getSuraAndDua(){
        return [
            'Муҳим танбеҳ',
            'Субҳонака',
            'Аттаҳиёту',
            'Аллоҳумма солли, Аллоҳумма борик',
            'Роббана отина',
            'Қунут дуоси',
            'Фотиҳа сураси',
            'Фил сураси',
            'Қурайш сураси',
            'Моун сураси',
            'Кавсар сураси',
            'Кофирун сураси',
            'Наср сураси',
            'Таббат сураси',
            'Ихлос сураси',
            'Фалақ сураси',
            'Нос сураси',
            'Оятал курси',
            'Оятал хирз',
        ];
    }
}
