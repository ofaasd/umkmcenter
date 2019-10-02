<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usaha;
use Yii;

/**
 * UsahaSearch represents the model behind the search form of `app\models\Usaha`.
 */
class UsahaSearch extends Usaha
{
    public $wilayah;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pemilik_id', 'bidang_id', 'izin_id', 'mentor_id', 'kredit_bank', 'tenaga_kerja'], 'integer'],
            [['nama_usaha', 'tahun_berdiri', 'alamat_usaha', 'notelp', 'email', 'website'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usaha::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'pemilik_id' => $this->pemilik_id,
            'bidang_id' => $this->bidang_id,
            'izin_id' => $this->izin_id,
            'mentor_id' => $this->mentor_id,
            'kredit_bank' => $this->kredit_bank,
            'tenaga_kerja' => $this->tenaga_kerja,
        ]);
        if(!empty(Yii::$app->user->id) && !Yii::$app->user->can("admin")){
            $this->wilayah = (new \yii\db\Query())
                    ->select("wilayah_id")
                    ->from('user')
                    ->where("id = " . Yii::$app->user->id)->scalar();
            $query->andFilterWhere([
                'wilayah_id'=>$this->wilayah,
            ]);
        }

        $query->andFilterWhere(['like', 'nama_usaha', $this->nama_usaha])
            ->andFilterWhere(['like', 'tahun_berdiri', $this->tahun_berdiri])
            ->andFilterWhere(['like', 'alamat_usaha', $this->alamat_usaha])
            ->andFilterWhere(['like', 'notelp', $this->notelp])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'website', $this->website]);

        return $dataProvider;
    }
}
