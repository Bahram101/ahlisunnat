<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string $en
 * @property string $tr
 * @property string|null $kz
 * @property string|null $ru
 * @property string|null $uz
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['en', 'tr'], 'required'],
            [['en', 'tr', 'kz', 'ru', 'uz'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'en' => 'En',
            'tr' => 'Tr',
            'kz' => 'Kz',
            'ru' => 'Ru',
            'uz' => 'Uz',
        ];
    }
}
