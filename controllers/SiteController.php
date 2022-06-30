<?php

namespace app\controllers;

use app\models\search\HistoryExport;
use app\models\search\HistoryPaginatedSearch;
use app\models\search\HistorySearch;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new HistoryPaginatedSearch();
        $model->load(Yii::$app->request->queryParams, '');

        if (!$model->validate()) {
            return $this->render('index', [
                'dataProvider' => $model->getEmptyDataProvider(),
            ]);
        }

        return $this->render('index', [
            'dataProvider' => $model->search(),
        ]);
    }


    /**
     * @param string $exportType
     * @return string
     */
    public function actionExport($exportType)
    {
        $model = new HistoryExport();
        $model->load(Yii::$app->request->queryParams, '');
        if (!$model->validate()) {
            return $this->render('export', [
                'dataProvider' => $model->getEmptyDataProvider(),
                'exportType' => $exportType,
            ]);
        }

        return $this->render('export', [
            'dataProvider' => $model->search(),
            'exportType' => $exportType,
        ]);
    }
}
