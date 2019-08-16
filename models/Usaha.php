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
 * @property int $bidang_id
 * @property int $izin_id
 * @property int $mentor_id
 * @property string $nama_usaha
 * @property int $tahun_berdiri
 * @property string $alamat_usaha
 * @property string $notelp
 * @property string $email
 * @property string $website
 * @property int $kredit_bank
 * @property int $tenaga_kerja
 *
 * @property Omset[] $omsets
 * @property Kategori $kategori
 * @property Program $program
 * @property Pemilik $pemilik
 * @property Bidang $bidang
 * @property Izin $izin
 * @property Mentor $mentor
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
            [['pemilik_id', 'bidang_id', 'izin_id', 'mentor_id', 'nama_usaha', 'tahun_berdiri', 'alamat_usaha', 'notelp', 'email', 'website', 'kredit_bank', 'tenaga_kerja'], 'required'],
            [['pemilik_id', 'bidang_id', 'izin_id', 'mentor_id', 'kredit_bank', 'tenaga_kerja'], 'integer'],
            [['alamat_usaha'], 'string'],
            [['tahun_berdiri'],'string','max'=>30],
            [['nama_usaha'], 'string', 'max' => 100],
            [['notelp'], 'string', 'max' => 20],
            [['email', 'website'], 'string', 'max' => 120],
            [['pemilik_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pemilik::className(), 'targetAttribute' => ['pemilik_id' => 'id']],
            [['bidang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bidang::className(), 'targetAttribute' => ['bidang_id' => 'id']],
            [['izin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Izin::className(), 'targetAttribute' => ['izin_id' => 'id']],
            [['mentor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mentor::className(), 'targetAttribute' => ['mentor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pemilik_id' => 'Pemilik ID',
            'bidang_id' => 'Bidang ID',
            'izin_id' => 'Izin ID',
            'mentor_id' => 'Mentor ID',
            'nama_usaha' => 'Nama Usaha',
            'tahun_berdiri' => 'Tahun Berdiri',
            'alamat_usaha' => 'Alamat Usaha',
            'notelp' => 'Notelp',
            'email' => 'Email',
            'website' => 'Website',
            'kredit_bank' => 'Kredit Bank',
            'tenaga_kerja' => 'Tenaga Kerja',
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
    public function getPemilik()
    {
        return $this->hasOne(Pemilik::className(), ['id' => 'pemilik_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBidang()
    {
        return $this->hasOne(Bidang::className(), ['id' => 'bidang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIzin()
    {
        return $this->hasOne(Izin::className(), ['id' => 'izin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMentor()
    {
        return $this->hasOne(Mentor::className(), ['id' => 'mentor_id']);
    }
}
