<?php

namespace app\libs\grid;

use yii\bootstrap5\LinkPager;
use yii\grid\GridView;

class AppGridView extends GridView
{
    public $layout = "{items}\n<div class=\"px-4 text-xs\">{summary}</div>\n{pager}";
    public $tableOptions = ['class' => "table"];
    public $headerRowOptions = [];
    public $pager = [
        'class' => LinkPager::class,
        'listOptions' => ['class' => 'pagination mb-0'],
    ];
}
