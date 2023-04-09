<?php

namespace app\libs\widgets;

class BooleanWidget
{
    public static function render($value, $trueString = 'TRUE', $falseString = 'FALSE', $trueClass = 'text-bg-success', $falseClass = 'text-bg-danger')
    {
        $css_class = $value == 1 ? 'badge ' . $trueClass : 'badge ' . $falseClass;
        $text = $value == 1 ? $trueString : $falseString;

        return '<span class="' . $css_class . '">' . strtoupper($text) . '</span>';
    }
}
