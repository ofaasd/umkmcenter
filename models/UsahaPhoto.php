<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usaha_photo".
 *
 * @property int $id
 * @property int $usaha_id
 * @property string $photo
 * @property string $tanggal
 * @property string $deskripsi
 */
class UsahaPhoto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usaha_photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usaha_id', 'photo', 'tanggal', 'deskripsi'], 'required'],
            [['usaha_id'], 'integer'],
            [['tanggal'], 'safe'],
            [['deskripsi'], 'string'],
            [['photo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usaha_id' => 'Usaha ID',
            'photo' => 'Photo',
            'tanggal' => 'Tanggal',
            'deskripsi' => 'Deskripsi',
        ];
    }
}
