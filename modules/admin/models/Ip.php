<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "ip".
 *
 * @property int $id
 * @property string $ip
 * @property string $city
 * @property string $updated
 */
class Ip extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip', 'city'], 'required'],
            [['ip', 'city'], 'string'],
            [['updated'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ip' => 'Ip',
            'city' => 'City',
            'updated' => 'Updated',
        ];
    }
}
