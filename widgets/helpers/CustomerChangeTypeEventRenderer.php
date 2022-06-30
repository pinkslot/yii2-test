<?php

namespace app\widgets\helpers;

use app\models\Customer;
use app\models\History;
use app\widgets\HistoryItem\StatusChangedHistoryItem;

class CustomerChangeTypeEventRenderer extends CsvMessageByBodyRenderer
{
    protected function getBodyByModel(History $model): string
    {
        return "$model->eventText " .
            (Customer::getTypeTextByType($model->getDetailOldValue('type')) ?? "not set") . ' to ' .
            (Customer::getTypeTextByType($model->getDetailNewValue('type')) ?? "not set");
    }

    public function renderItem(History $model): string
    {
        return StatusChangedHistoryItem::widget([
            'model' => $model,
            'oldValue' => Customer::getQualityTextByQuality($model->getDetailOldValue('quality')),
            'newValue' => Customer::getQualityTextByQuality($model->getDetailNewValue('quality')),
        ]);
    }
}
