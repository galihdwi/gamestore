<?php

namespace app\libs\grid;

use yii\bootstrap5\LinkPager;
use yii\grid\GridView;

class AppGridView extends GridView
{
    public $layout = "{items}\n<div class=\"text-xs\">{summary}</div>\n<div class=\"py-3\">{pager}</div>";
    public $tableOptions = ['class' => "table"];
    public $headerRowOptions = [];
    public $pager = [
        'class' => LinkPager::class,
        'listOptions' => ['class' => 'pagination mb-0'],
    ];
}
