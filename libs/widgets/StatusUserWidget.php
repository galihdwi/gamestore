<?php

namespace app\libs\widgets;

class StatusUserWidget
{
    public static function render($value)
    {
        $badgeClassOptions = [
            'DISABLED' => 'text-bg-secondary text-secondary bg-opacity-10',
            'ACTIVE' => 'text-bg-primary text-primary bg-opacity-10',
        ];

        $badgeClass = isset($badgeClassOptions[$value]) ? $badgeClassOptions[$value]  : 'text-bg-secondary text-secondary bg-opacity-10';
        $text = isset($badgeClassOptions[$value]) ? $value : "UNKNOWN | {$value}";

        return '<span class="badge ' . $badgeClass . '">' . strtoupper($text) . '</span>';
    }
}
