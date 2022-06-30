<?php

namespace app\widgets\helpers;

use app\models\History;

abstract class CsvMessageByBodyRenderer implements CsvMessageRendererInterface
{
    abstract protected function getBodyByModel(History $model): string;

    public function getCsvMessage(History $model): string
    {
        return strip_tags($this->getBodyByModel($model));
    }
}
