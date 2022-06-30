<?php

namespace app\widgets\helpers;

use app\models\Call;
use app\models\History;
use app\widgets\HistoryItem\CommonHistoryItem;

class CallEventRenderer extends CsvMessageByBodyRenderer implements CsvMessageRendererInterface, HistoryItemRendererInterface
{
    protected function getBodyByModel(History $model): string
    {
        /** @var Call $call */
        $call = $model->call;

        return ($call ? $call->totalStatusText . ($call->getTotalDisposition(false) ? " <span class='text-grey'>" . $call->getTotalDisposition(false) . "</span>" : "") : '<i>Deleted</i> ');
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
