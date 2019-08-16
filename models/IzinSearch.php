<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Izin;

/**
 * IzinSearch represents the model behind the search form of `app\models\Izin`.
 */
class IzinSearch extends Izin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['akte_notaris', 'badan_hukum', 'siup', 'npwp', 'tdp', 'lain'], 'safe'],
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
        $query = Izin::find();

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
        ]);

        $query->andFilterWhere(['like', 'akte_notaris', $this->akte_notaris])
            ->andFilterWhere(['like', 'badan_hukum', $this->badan_hukum])
            ->andFilterWhere(['like', 'siup', $this->siup])
            ->andFilterWhere(['like', 'npwp', $this->npwp])
            ->andFilterWhere(['like', 'tdp', $this->tdp])
            ->andFilterWhere(['like', 'lain', $this->lain]);

        return $dataProvider;
    }
}
