<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mentor;
use Yii;

/**
 * MentorSearch represents the model behind the search form of `app\models\Mentor`.
 */
class MentorSearch extends Mentor
{
    public $wilayah;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nama'], 'safe'],
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
        $query = Mentor::find();

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
        if(!empty(Yii::$app->user->id) && Yii::$app->user->can("admin")){
             //echo "masuk sini";
            $query->andFilterWhere([
                'id' => $this->id,
            ]);
        }elseif(!empty(Yii::$app->user->id)){
            $this->wilayah = (new \yii\db\Query())
                    ->select("wilayah_id")
                    ->from('user')
                    ->where("id = " . Yii::$app->user->id)->scalar();
            $query->andFilterWhere([
                'id' => $this->id,
               
                'wilayah_id'=>$this->wilayah,
            ]);
        }else{
           
        }

        

        $query->andFilterWhere(['like', 'nama', $this->nama]);

        return $dataProvider;
    }
}
