<?php

namespace app\widgets\HistoryItem;

use app\models\User;
use yii\base\Widget;

class CommonHistoryItem extends Widget
{
    /** @var User|null */
    public $user;
    /** @var string */
    public $body;
    /** @var string */
    public $footer;
    /** @var string */
    public $footerDatetime;
    /** @var string */
    public $bodyDatetime;
    /** @var string */
    public $iconClass;
    /** @var string */
    public $content;

    public function run()
    {
        return $this->render('common', [
            'user' => $this->user,
            'body' => $this->body,
            'footer' => $this->footer,
            'footerDatetime' => $this->footerDatetime,
            'bodyDatetime' => $this->bodyDatetime,
            'iconClass' => $this->iconClass,
            'content' => $this->content,
        ]);
    }
}
