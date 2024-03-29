<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Programation;

/**
 * ProgramationSearch represents the model behind the search form of `app\models\Programation`.
 */
class ProgramationSearch extends Programation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_services_personal', 'id_turn', 'created_by', 'modified_by'], 'integer'],
            [['date_program', 'created_date', 'modified_date'], 'safe'],
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
        $query = Programation::find();

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
            'date_program' => $this->date_program,
            'id_services_personal' => $this->id_services_personal,
            'id_turn' => $this->id_turn,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'modified_by' => $this->modified_by,
            'modified_date' => $this->modified_date,
        ]);

        return $dataProvider;
    }
}
