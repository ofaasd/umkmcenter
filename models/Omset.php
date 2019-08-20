<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "omset".
 *
 * @property int $id
 * @property int $usaha_id
 * @property int $omset
 * @property int $penjualan
 * @property string $bulan
 *
 * @property Usaha $usaha
 */
class Omset extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'omset';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usaha_id', 'omset', 'bulan','tahun'], 'required'],
            [['usaha_id', 'omset', 'penjualan','tahun'], 'integer'],
            [['bulan'], 'safe'],
            [['usaha_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usaha::className(), 'targetAttribute' => ['usaha_id' => 'id']],
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
            'omset' => 'Omset',
            'penjualan' => 'Penjualan',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsaha()
    {
        return $this->hasOne(Usaha::className(), ['id' => 'usaha_id']);
    }
}
