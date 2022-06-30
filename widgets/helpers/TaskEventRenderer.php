<?php

namespace app\widgets\helpers;

use app\models\History;
use app\widgets\HistoryItem\CommonHistoryItem;

class TaskEventRenderer extends CsvMessageByBodyRenderer
{
    protected function getBodyByModel(History $model): string
    {
        $task = $model->task;

        return "$model->eventText: " . ($task->title ?? '');
    }

    public function renderItem(History $model): string
    {
        $task = $model->task;

        return CommonHistoryItem::widget([
            'user' => $model->user,
            'body' => static::getBodyByModel($model),
            'iconClass' => 'fa-check-square bg-yellow',
            'footerDatetime' => $model->ins_ts,
            'footer' => isset($task->customerCreditor->name) ? "Creditor: " . $task->customerCreditor->name : ''
        ]);
    }
}
