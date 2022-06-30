<?php

namespace app\widgets\helpers;

use app\models\Customer;
use app\models\History;
use app\widgets\HistoryItem\StatusChangedHistoryItem;

class CustomerChangeQualityEventRenderer extends CsvMessageByBodyRenderer
{
    protected function getBodyByModel(History $model): string
    {
        return "$model->eventText " .
            (Customer::getQualityTextByQuality($model->getDetailOldValue('quality')) ?? "not set") . ' to ' .
            (Customer::getQualityTextByQuality($model->getDetailNewValue('quality')) ?? "not set");
    }

    public function renderItem(History $model): string
    {
        return StatusChangedHistoryItem::widget([
            'model' => $model,
            'oldValue' => Customer::getTypeTextByType($model->getDetailOldValue('type')),
            'newValue' => Customer::getTypeTextByType($model->getDetailNewValue('type'))
        ]);
    }
}
