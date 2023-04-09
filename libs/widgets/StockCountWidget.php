<?php

namespace app\libs\widgets;

use yii\bootstrap5\Html;

class StockCountWidget
{
    public static function render($value)
    {
        if ($value > 5) {
            $textClass = 'text-success bg-success bg-opacity-10';
        } else if ($value <= 5 && $value > 0) {
            $textClass = 'text-warning bg-warning bg-opacity-10';
        } else {
            $textClass = 'text-danger bg-danger bg-opacity-10';
        }

        return Html::tag('span', $value, ['class' => "px-2 rounded {$textClass} fw-bold app-text-small"]);
    }
}
