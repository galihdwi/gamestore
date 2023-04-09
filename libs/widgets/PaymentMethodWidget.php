<?php

namespace app\libs\widgets;

class PaymentMethodWidget
{
    public static function render($value)
    {
        $badgeClassOptions = [
            'BANK_TRANSFER' => 'text-bg-primary text-primary bg-opacity-10',
            'TUNAI' => 'text-bg-danger text-danger bg-opacity-10',
            'QRIS' => 'text-bg-success text-success bg-opacity-10',
        ];

        $badgeClass = isset($badgeClassOptions[$value]) ? $badgeClassOptions[$value]  : 'text-bg-secondary text-secondary bg-opacity-10';
        $text = isset($badgeClassOptions[$value]) ? $value : "UNKNOWN | {$value}";

        return '<span class="badge ' . $badgeClass . '">' . strtoupper($text) . '</span>';
    }
}
