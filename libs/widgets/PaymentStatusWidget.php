<?php

namespace app\libs\widgets;

class PaymentStatusWidget
{
    public static function render($value)
    {
        $badgeClassOptions = [
            'MENUNGGU_KONFIRMASI' => 'text-bg-warning text-warning bg-opacity-10',
            'VALID' => 'text-bg-success text-success bg-opacity-10',
            'TIDAK_VALID' => 'text-bg-danger text-danger bg-opacity-10',
        ];

        $badgeClass = isset($badgeClassOptions[$value]) ? $badgeClassOptions[$value]  : 'text-bg-secondary text-secondary bg-opacity-10';
        $text = isset($badgeClassOptions[$value]) ? $value : "UNKNOWN | {$value}";

        return '<span class="badge ' . $badgeClass . '">' . strtoupper($text) . '</span>';
    }
}
