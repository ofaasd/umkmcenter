<?php

namespace app\modules\user\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property int $id
 * @property string $nama_kota
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kota'], 'required'],
            [['nama_kota'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kota' => 'Nama Kota',
        ];
    }
}
