<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Attivita;

/**
 * AttivitaSearch represents the model behind the search form of `app\models\Attivita`.
 */
class AttivitaSearch extends Attivita
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'bilancio_id', 'categoria_id'], 'integer'],
            [['voce', 'data'], 'safe'],
            [['importo'], 'number'],
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
        $query = Attivita::find();

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
            'importo' => $this->importo,
            'data' => $this->data,
            'bilancio_id' => $this->bilancio_id,
            'categoria_id' => $this->categoria_id,
        ]);

        $query->andFilterWhere(['like', 'voce', $this->voce]);

        return $dataProvider;
    }
}
