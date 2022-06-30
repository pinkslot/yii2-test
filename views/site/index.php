<?php

use app\widgets\HistoryList\HistoryList;
use yii\data\ActiveDataProvider;

/* @var $dataProvider ActiveDataProvider */

$this->title = 'Americor Test';
?>

<div class="site-index">
    <?= HistoryList::widget([
        'dataProvider' => $dataProvider,
    ]) ?>
</div>
