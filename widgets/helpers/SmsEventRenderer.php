<?php

namespace app\widgets\helpers;

use app\models\History;
use app\models\Sms;
use app\widgets\HistoryItem\CommonHistoryItem;
use Yii;

class SmsEventRenderer extends CsvMessageByBodyRenderer
{
    protected function getBodyByModel(History $model): string
    {
        return $model->sms->message ?: '';
    }

    public function renderItem(History $model): string
    {
        return CommonHistoryItem::widget([
            'user' => $model->user,
            'body' => static::getBodyByModel($model),
            'footer' => $model->sms->direction == Sms::DIRECTION_INCOMING ?
                Yii::t('app', 'Incoming message from {number}', [
                    'number' => $model->sms->phone_from ?? ''
                ]) : Yii::t('app', 'Sent message to {number}', [
                    'number' => $model->sms->phone_to ?? ''
                ]),
            'footerDatetime' => $model->ins_ts,
            'iconClass' => 'icon-sms bg-dark-blue'
        ]);
    }
}
