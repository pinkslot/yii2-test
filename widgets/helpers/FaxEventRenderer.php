<?php

namespace app\widgets\helpers;

use app\models\History;
use app\widgets\HistoryItem\CommonHistoryItem;
use Yii;
use yii\helpers\Html;

class FaxEventRenderer extends CsvMessageByBodyRenderer
{
    protected function getBodyByModel(History $model): string
    {
        return $model->eventText;
    }

    public function renderItem(History $model): string
    {
        $fax = $model->fax;

        return CommonHistoryItem::widget([
            'user' => $model->user,
            'body' => static::getBodyByModel($model) .
                ' - ' .
                (isset($fax->document) ? Html::a(
                    Yii::t('app', 'view document'),
                    $fax->document->getViewUrl(),
                    [
                        'target' => '_blank',
                        'data-pjax' => 0
                    ]
                ) : ''),
            'footer' => Yii::t('app', '{type} was sent to {group}', [
                'type' => $fax ? $fax->getTypeText() : 'Fax',
                'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
            ]),
            'footerDatetime' => $model->ins_ts,
            'iconClass' => 'fa-fax bg-green'
        ]);
    }
}
