<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StaffMed;

/**
 * StaffMedSearch represents the model behind the search form of `app\models\StaffMed`.
 */
class StaffMedSearch extends StaffMed
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'max_q', 'q_issued', 'q_slope', 'id_prof', 'created_by', 'modified_by'], 'integer'],
            [['cod_staff_med', 'name_staff_med', 'created_date', 'modified_date'], 'safe'],
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
        $query = StaffMed::find();

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
            'max_q' => $this->max_q,
            'q_issued' => $this->q_issued,
            'q_slope' => $this->q_slope,
            'id_prof' => $this->id_prof,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'modified_by' => $this->modified_by,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'cod_staff_med', $this->cod_staff_med])
            ->andFilterWhere(['like', 'name_staff_med', $this->name_staff_med]);

        return $dataProvider;
    }
}
