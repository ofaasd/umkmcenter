<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "izin".
 *
 * @property int $id
 * @property string $akte_notaris
 * @property string $badan_hukum
 * @property string $siup
 * @property string $npwp
 * @property string $tdp
 * @property string $lain
 */
class Izin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'izin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['akte_notaris', 'badan_hukum', 'siup', 'npwp', 'tdp', 'lain'], 'required'],
            [['akte_notaris', 'badan_hukum'], 'string', 'max' => 100],
            [['siup', 'npwp', 'tdp'], 'string', 'max' => 50],
            [['lain'], 'string', 'max' => 80],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'akte_notaris' => 'Akte Notaris',
            'badan_hukum' => 'Badan Hukum',
            'siup' => 'Siup',
            'npwp' => 'Npwp',
            'tdp' => 'Tdp',
            'lain' => 'Lain',
        ];
    }
}
