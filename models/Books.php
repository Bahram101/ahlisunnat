<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookss".
 *
 * @property int $id
 * @property int $book_id
 * @property string $name
 * @property string $created
 * @property int $site
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'name', 'created'], 'required'],
            [['book_id'], 'integer'],
            [['name'], 'string'],
            [['created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'name' => 'Name',
            'created' => 'Created',
            'site' => 'Site',
        ];
    }
}
