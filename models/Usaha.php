<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usaha".
 *
 * @property int $id
 * @property int $program_id
 * @property int $kategori_id
 * @property int $pemilik_id
 * @property string $nama
 * @property int $tahun_berdiri
 * @property string $alamat
 * @property string $notelp
 * @property string $email
 * @property string $website
 *
 * @property Omset[] $omsets
 * @property Kategori $kategori
 * @property Program $program
 * @property Pemilik $pemilik
 */
class Usaha extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usaha';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_id', 'kategori_id', 'pemilik_id', 'nama', 'tahun_berdiri', 'alamat', 'notelp', 'email', 'website'], 'required'],
            [['program_id', 'kategori_id', 'pemilik_id', 'tahun_berdiri'], 'integer'],
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 100],
            [['notelp'], 'string', 'max' => 20],
            [['email', 'website'], 'string', 'max' => 120],
            [['kategori_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kategori::className(), 'targetAttribute' => ['kategori_id' => 'id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['program_id' => 'id']],
            [['pemilik_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pemilik::className(), 'targetAttribute' => ['pemilik_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'program_id' => 'Program ID',
            'kategori_id' => 'Kategori ID',
            'pemilik_id' => 'Pemilik ID',
            'nama' => 'Nama',
            'tahun_berdiri' => 'Tahun Berdiri',
            'alamat' => 'Alamat',
            'notelp' => 'Notelp',
            'email' => 'Email',
            'website' => 'Website',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOmsets()
    {
        return $this->hasMany(Omset::className(), ['usaha_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'kategori_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['id' => 'program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemilik()
    {
        return $this->hasOne(Pemilik::className(), ['id' => 'pemilik_id']);
    }
}
