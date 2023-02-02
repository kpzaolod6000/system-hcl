<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cupos;

/**
 * CuposSearch represents the model behind the search form of `app\models\Cupos`.
 */
class CuposSearch extends Cupos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order', 'nro_receipt', 'receipt', 'status', 'id_history_clinic', 'id_patient', 'id_programation', 'id_services', 'id_staff_med', 'id_fua', 'type_sure', 'created_by', 'modified_by'], 'integer'],
            [['phone', 'datte_attention', 'last_attention', 'reference', 'ip', 'created_date', 'modified_date'], 'safe'],
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
        $query = Cupos::find();

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
            'order' => $this->order,
            'datte_attention' => $this->datte_attention,
            'last_attention' => $this->last_attention,
            'nro_receipt' => $this->nro_receipt,
            'receipt' => $this->receipt,
            'status' => $this->status,
            'id_history_clinic' => $this->id_history_clinic,
            'id_patient' => $this->id_patient,
            'id_programation' => $this->id_programation,
            'id_services' => $this->id_services,
            'id_staff_med' => $this->id_staff_med,
            'id_fua' => $this->id_fua,
            'type_sure' => $this->type_sure,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'modified_by' => $this->modified_by,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'ip', $this->ip]);

        return $dataProvider;
    }
}
