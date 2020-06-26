<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "sendnewsletter".
 *
 * @property int $id
 * @property int $newsletter_id
 * @property string $date
 * @property int $status
 */
class Sendnewsletter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sendnewsletter';
    }

    public function getNewsletter(){
        return $this->hasOne(Newsletters::class, ['id'=>'newsletter_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['newsletter_id', 'category_id'], 'required'],
            [['newsletter_id', 'status', 'category_id'], 'integer'],
            [['date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'newsletter_id' => 'Название рассылки',
            'category_id' => 'Категория',
            'date' => 'Дата',
            'status' => 'Статус',
        ];
    }
}
