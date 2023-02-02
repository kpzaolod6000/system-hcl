<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fua;

/**
 * FuaSearch represents the model behind the search form of `app\models\Fua`.
 */
class FuaSearch extends Fua
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nro_hcl', 'id_ipress', 'created_by', 'modified_by'], 'integer'],
            [['type_doc', 'nro_doc', 'cod_sure', 'date_attention', 'nro_ref', 'created_date', 'modified_date'], 'safe'],
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
        $query = Fua::find();

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
            'nro_hcl' => $this->nro_hcl,
            'date_attention' => $this->date_attention,
            'id_ipress' => $this->id_ipress,
            'created_by' => $this->created_by,
            'created_date' => $this->created_date,
            'modified_by' => $this->modified_by,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'type_doc', $this->type_doc])
            ->andFilterWhere(['like', 'nro_doc', $this->nro_doc])
            ->andFilterWhere(['like', 'cod_sure', $this->cod_sure])
            ->andFilterWhere(['like', 'nro_ref', $this->nro_ref]);

        return $dataProvider;
    }
}
