<?php

namespace app\widgets\HistoryList;

use app\widgets\Export\Export;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;

class HistoryList extends Widget
{
    /** @var ActiveDataProvider $dataProvider */
    public $dataProvider;

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('main', [
            'linkExport' => $this->getLinkExport(),
            'dataProvider' => $this->dataProvider,
        ]);
    }

    /**
     * @return string
     */
    private function getLinkExport()
    {
        return Url::current([
            0 => 'site/export',
            'exportType' => Export::FORMAT_CSV,
        ]);
    }
}
