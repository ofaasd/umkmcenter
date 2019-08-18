<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programusaha".
 *
 * @property int $program_id
 * @property int $usaha_id
 */
class Programusaha extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programusaha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_id', 'usaha_id'], 'required'],
            [['program_id', 'usaha_id'], 'integer'],
            [['program_id', 'usaha_id'], 'unique', 'targetAttribute' => ['program_id', 'usaha_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'program_id' => 'Program ID',
            'usaha_id' => 'Usaha ID',
        ];
    }
}
