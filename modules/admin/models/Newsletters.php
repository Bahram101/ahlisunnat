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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'subtitile', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['title', 'subtitile'], 'string', 'max' => 255],
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
            'subtitile' => 'Subtitile',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }
}
