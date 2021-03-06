<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Omset;
use Yii;

/**
 * OmsetSearch represents the model behind the search form of `app\models\Omset`.
 */
class OmsetSearch extends Omset
{
    public $wilayah;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'usaha_id', 'omset', 'penjualan'], 'integer'],
            [['bulan'], 'safe'],
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
        $query = Omset::find();

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
            'usaha_id' => $this->usaha_id,
            'omset' => $this->omset,
            'penjualan' => $this->penjualan,
            'bulan' => $this->bulan,
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

        return $dataProvider;
    }
}
