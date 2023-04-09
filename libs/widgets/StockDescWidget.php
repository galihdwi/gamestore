<?php

namespace app\libs\widgets;

use yii\bootstrap5\Html;

class StockDescWidget
{
    public static function render($value)
    {


        $template = str_contains($value, '-') ? Html::tag('span', $value, ['class' => "p-2 badge text-bg-danger text-danger bg-opacity-10"]) : Html::tag('span', '+' . $value, ['class' => "p-2 badge text-bg-success text-success bg-opacity-10"]);

        return $template;
    }
}
