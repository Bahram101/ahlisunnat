<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property int $country_id
 * @property string $name_en
 * @property string $name_tr
 * @property string $state_en
 * @property string $state_tr
 * @property string|null $name_ru
 * @property string|null $name_kz
 * @property int $ready
 * @property string|null $state_ru
 * @property string|null $state_kz
 * @property string|null $name_uz
 * @property string|null $state_uz
 * @property string $timezone
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id', 'name_en', 'name_tr', 'state_en', 'state_tr', 'timezone'], 'required'],
            [['country_id', 'ready'], 'integer'],
            [['name_en', 'name_tr', 'state_en', 'state_tr', 'name_ru', 'name_kz', 'name_uz'], 'string', 'max' => 500],
            [['state_ru', 'state_kz', 'state_uz'], 'string', 'max' => 300],
            [['timezone'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'name_en' => 'Name En',
            'name_tr' => 'Name Tr',
            'state_en' => 'State En',
            'state_tr' => 'State Tr',
            'name_ru' => 'Name Ru',
            'name_kz' => 'Name Kz',
            'ready' => 'Ready',
            'state_ru' => 'State Ru',
            'state_kz' => 'State Kz',
            'name_uz' => 'Name Uz',
            'state_uz' => 'State Uz',
            'timezone' => 'Timezone',
        ];
    }
}
