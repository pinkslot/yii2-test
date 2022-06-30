<?php

namespace app\widgets\helpers;

use app\models\History;
use app\widgets\HistoryItem\CommonHistoryItem;

class DefaultRenderer extends CsvMessageByBodyRenderer
{
    protected function getBodyByModel(History $model): string
    {
        return $model->eventText;
    }

    public function renderItem(History $model): string
    {
        $task = $model->task;

        return CommonHistoryItem::widget([
            'user' => $model->user,
            'body' => static::getBodyByModel($model),
            'bodyDatetime' => $model->ins_ts,
            'iconClass' => 'fa-gear bg-purple-light'
        ]);
    }
}
