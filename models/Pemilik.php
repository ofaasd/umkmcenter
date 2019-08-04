<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemilik".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $notelp
 * @property int $status
 *
 * @property Usaha[] $usahas
 */
class Pemilik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemilik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'notelp', 'status'], 'required'],
            [['alamat'], 'string'],
            [['status'], 'integer'],
            [['nama'], 'string', 'max' => 120],
            [['notelp'], 'string', 'max' => 20],
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
            'alamat' => 'Alamat',
            'notelp' => 'Notelp',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsahas()
    {
        return $this->hasMany(Usaha::className(), ['pemilik_id' => 'id']);
    }
}
