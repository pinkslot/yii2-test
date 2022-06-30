<?php

namespace app\widgets\helpers;

use app\models\History;

interface HistoryItemRendererInterface
{
    public function renderItem(History $model): string;
}
