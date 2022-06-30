<?php

namespace app\widgets\HistoryItem;

use app\models\History;

class StatusChangedHistoryItem extends CommonHistoryItem
{
    /* @var History */
    public $model;
    /* @var string */
    public $oldValue;
    /* @var string */
    public $newValue;
    /* @var string */
    public $content;

    public function run()
    {
        return $this->render('status_changed', [
            'model' => $this->model,
            'oldValue' => $this->oldValue,
            'newValue' => $this->newValue,
            'content' => $this->content,
        ]);
    }
}
