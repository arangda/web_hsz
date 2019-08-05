<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Register;

/**
 * RegisterSearch represents the model behind the search form of `common\models\Register`.
 */
class RegisterSearch extends Register
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tel', 'age'], 'integer'],
            [['name', 'sex', 'disease', 'source', 'cdate', 'rdate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Register::find()->orderBy('id DESC');

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
            'tel' => $this->tel,
            'age' => $this->age,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'disease', $this->disease])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'cdate', $this->cdate])
            ->andFilterWhere(['like', 'rdate', $this->rdate]);

        return $dataProvider;
    }
}
