<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ipress;

/**
 * IpressSearch represents the model behind the search form of `app\models\Ipress`.
 */
class IpressSearch extends Ipress
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'modified_by'], 'integer'],
            [['cod_ipress', 'full_name', 'establishment', 'department', 'province', 'district', 'ubigeo', 'diresa', 'name_red', 'cod_microred', 'disa', 'red', 'microred', 'cod_ue', 'name_ue', 'created_date', 'modified_date'], 'safe'],
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
        $query = Ipress::find();

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
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'modified_by' => $this->modified_by,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'cod_ipress', $this->cod_ipress])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'establishment', $this->establishment])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'ubigeo', $this->ubigeo])
            ->andFilterWhere(['like', 'diresa', $this->diresa])
            ->andFilterWhere(['like', 'name_red', $this->name_red])
            ->andFilterWhere(['like', 'cod_microred', $this->cod_microred])
            ->andFilterWhere(['like', 'disa', $this->disa])
            ->andFilterWhere(['like', 'red', $this->red])
            ->andFilterWhere(['like', 'microred', $this->microred])
            ->andFilterWhere(['like', 'cod_ue', $this->cod_ue])
            ->andFilterWhere(['like', 'name_ue', $this->name_ue]);

        return $dataProvider;
    }
}
