<?php

namespace app\widgets\helpers;

use app\models\History;

interface CsvMessageRendererInterface
{
    public function getCsvMessage(History $model): string;
}
