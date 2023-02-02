<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HistoryClinic;

/**
 * HistoryClinicSearch represents the model behind the search form of `app\models\HistoryClinic`.
 */
class HistoryClinicSearch extends HistoryClinic
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nro_history_clinic', 'nro_phone', 'id_type_sure', 'id_marital_status', 'id_instruction_grade', 'id_patient', 'id_patient_comp', 'created_by', 'modified_by'], 'integer'],
            [['date_entry', 'addres', 'profession', 'ocupation', 'religion', 'procedence', 'created_date', 'modified_date'], 'safe'],
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
        $query = HistoryClinic::find();

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
            'nro_history_clinic' => $this->nro_history_clinic,
            'date_entry' => $this->date_entry,
            'nro_phone' => $this->nro_phone,
            'id_type_sure' => $this->id_type_sure,
            'id_marital_status' => $this->id_marital_status,
            'id_instruction_grade' => $this->id_instruction_grade,
            'id_patient' => $this->id_patient,
            'id_patient_comp' => $this->id_patient_comp,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'modified_by' => $this->modified_by,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'addres', $this->addres])
            ->andFilterWhere(['like', 'profession', $this->profession])
            ->andFilterWhere(['like', 'ocupation', $this->ocupation])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'procedence', $this->procedence]);

        return $dataProvider;
    }
}
