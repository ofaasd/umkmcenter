<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property int $id
 * @property string $nama
 * @property int $tahun_acara
 *
 * @property Usaha[] $usahas
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tahun_acara'], 'required'],
            [['tahun_acara'], 'string', 'max'=>60],
            [['nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tahun_acara' => 'Tahun Acara',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsahas()
    {
        return $this->hasMany(Usaha::className(), ['program_id' => 'id']);
    }
}
