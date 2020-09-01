<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AngebotSearch represents the model behind the search form of `app\models\Angebot`.
 */
class AngebotSearch extends Angebot
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'filiale_id'], 'integer'],
            [['name', 'visual', 'kalender_woche', 'detail_link'], 'safe'],
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
        $query = Angebot::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'filiale_id' => $this->filiale_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'visual', $this->visual])
            ->andFilterWhere(['like', 'kalender_woche', $this->kalender_woche])
            ->andFilterWhere(['like', 'detail_link', $this->detail_link]);

        return $dataProvider;
    }
}
