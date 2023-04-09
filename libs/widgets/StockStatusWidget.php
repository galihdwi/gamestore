<?php

namespace app\libs\widgets;

use yii\bootstrap5\Html;

class StockStatusWidget
{
    public static function render($value)
    {
        $ret = "";
        if ($value * 1 > 0) {
            $textClass = 'text-success bg-success bg-opacity-10';
            $ret = 'Tersedia';
        } else {
            $textClass = 'text-danger bg-danger bg-opacity-10';
            $ret = 'Habis';
        }

        return Html::tag('span', $ret, ['class' => "px-2 rounded {$textClass} fw-bold app-text-small"]);
    }
}
