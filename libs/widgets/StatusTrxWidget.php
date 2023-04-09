<?php

namespace app\libs\widgets;

class StatusTrxWidget
{
    public static function render($value)
    {
        $badgeClassOptions = [
            'MENUNGGU_PEMBAYARAN' => 'text-bg-info text-info bg-opacity-10',
            'VALIDASI_PEMBAYARAN' => 'text-bg-warning text-warning bg-opacity-10',
            'MENUNGGU_KONFIRMASI_PESANAN' => 'text-bg-warning text-warning bg-opacity-10',
            'PENGEMBALIAN_DANA' => 'text-bg-danger text-danger bg-opacity-10',
            'PESANAN_DIPROSES' => 'text-bg-primary text-primary bg-opacity-10',
            'PESANAN_SIAP' => 'text-bg-success text-success bg-opacity-10',
            'PESANAN_SELESAI' => 'text-bg-success text-success bg-opacity-10',
            'PESANAN_DIBATALKAN' => 'text-bg-danger text-danger bg-opacity-10',
        ];

        $badgeClass = isset($badgeClassOptions[$value]) ? $badgeClassOptions[$value]  : 'text-bg-secondary text-secondary bg-opacity-10';
        $text = isset($badgeClassOptions[$value]) ? $value : "UNKNOWN | {$value}";

        return '<span class="badge ' . $badgeClass . '">' . strtoupper($text) . '</span>';
    }
}
