<?php

namespace app\widgets\helpers;

use app\models\History;

class CompositeRenderer implements CsvMessageRendererInterface, HistoryItemRendererInterface
{
    public function __construct()
    {
        $this->taskEventRenderer = new TaskEventRenderer();
        $this->smsEventRenderer = new SmsEventRenderer();
        $this->faxEventRenderer = new FaxEventRenderer();
        $this->customerChangeTypeEventRenderer = new CustomerChangeTypeEventRenderer();
        $this->customerChangeQualityEventRenderer = new CustomerChangeQualityEventRenderer();
        $this->callEventRenderer = new CallEventRenderer();
        $this->defaultRenderer = new DefaultRenderer();
    }

    private function getRenderer(History $model)
    {
        switch ($model->event) {
            case History::EVENT_CREATED_TASK:
            case History::EVENT_COMPLETED_TASK:
            case History::EVENT_UPDATED_TASK:
                return $this->taskEventRenderer;
            case History::EVENT_INCOMING_SMS:
            case History::EVENT_OUTGOING_SMS:
                return $this->smsEventRenderer;
            case History::EVENT_OUTGOING_FAX:
            case History::EVENT_INCOMING_FAX:
                return $this->faxEventRenderer;
            case History::EVENT_CUSTOMER_CHANGE_TYPE:
                return $this->customerChangeTypeEventRenderer;
            case History::EVENT_CUSTOMER_CHANGE_QUALITY:
                return $this->customerChangeQualityEventRenderer;
            case History::EVENT_INCOMING_CALL:
            case History::EVENT_OUTGOING_CALL:
                return $this->callEventRenderer;
            default:
                return $this->defaultRenderer;
        }
    }

    public function renderItem(History $model): string
    {
        return $this->getRenderer($model)->renderItem($model);
    }

    public function getCsvMessage(History $model): string
    {
        return $this->getRenderer($model)->getCsvMessage($model);
    }
}
