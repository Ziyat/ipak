<?php

namespace common\entities;

use kartik\daterange\DateRangeBehavior;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\entities\Reports;

/**
 * ReportsSearch represents the model behind the search form of `common\entities\Reports`.
 */
class ReportsSearch extends Reports
{

    public $createTimeRange;
    public $createTimeStart;
    public $createTimeEnd;

    public function behaviors()
    {
        return [
            [
                'class' => DateRangeBehavior::className(),
                'attribute' => 'createTimeRange',
                'dateStartAttribute' => 'createTimeStart',
                'dateEndAttribute' => 'createTimeEnd',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mfo_client', 'mfo_correspondent', 'account_correspondent', 'account_client', 'document_amount', 'executor', 'date_message'], 'integer'],
            [['name_client', 'name_correspondent', 'purpose_of_payment', 'criterion'], 'safe'],
            [['createTimeRange'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
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
        $query = Reports::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'mfo_client' => $this->mfo_client,
            'mfo_correspondent' => $this->mfo_correspondent,
            'account_correspondent' => $this->account_correspondent,
            'account_client' => $this->account_client,
            'document_amount' => $this->document_amount,
            'executor' => $this->executor,
            'date_message' => $this->date_message,
        ]);

        $query->andFilterWhere(['like', 'name_client', $this->name_client])
            ->andFilterWhere(['like', 'name_correspondent', $this->name_correspondent])
            ->andFilterWhere(['like', 'purpose_of_payment', $this->purpose_of_payment])
            ->andFilterWhere(['like', 'criterion', $this->criterion])
            ->andFilterWhere(['>=', 'createdAt', $this->createTimeStart])
            ->andFilterWhere(['<', 'createdAt', $this->createTimeEnd]);


        return $dataProvider;
    }
}
