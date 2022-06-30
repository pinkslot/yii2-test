<?php

namespace app\models\search;

class HistoryPaginatedSearch extends HistorySearch
{
    /**
     * @var int|null
     */
    public $page;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['page', 'integer', 'min' => 0 ],
        ];
    }
}
