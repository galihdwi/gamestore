<?php

namespace app\libs\notification\template;

use app\libs\notification\TemplateNotificationInterface;

class WhatsappTemplate implements TemplateNotificationInterface
{
    /**
     * register verification message
     */
    public function getRegisterVerificationMsg($user, $appName, $otpCode)
    {
        return "Halo {$user},\n\nTerima kasih telah mendaftar di {$appName}.\n\nUntuk memverifikasi akun Anda, silakan masukkan kode verifikasi berikut:\n\n{$otpCode}\n\nKode di atas hanya berlaku 30 menit. Mohon jangan sebarkan kode ini ke siapapun, termasuk pihak yang mengatasnamakan {$appName}.\n\nPesan ini dikirim secara otomatis oleh sistem. Mohon tidak membalas pesan ini.";
    }

    /**
     * success register message
     */
    public function getSuccessRegisterMsg($user, $appName)
    {
        return "Halo {$user},\n\nSelamat! Akun Anda telah berhasil diverifikasi.\n\nKini Anda dapat menikmati pengalaman belanja yang lebih aman dan nyaman di {$appName}. Gunakan fitur-fitur yang tersedia untuk membuat pengalaman belanja Anda lebih menyenangkan.\n\nPesan ini dikirim secara otomatis oleh sistem. Mohon untuk tidak membalas pesan ini.";
    }

    /**
     * forgot password verification message
     */
    public function getForgotPasswordVerificationMsg($user, $appName, $otpCode)
    {
        return "Halo {$user},\n\nIni adalah pemberitahuan bahwa kami menerima permintaan untuk mengatur ulang kata sandi anda di {$appName}.\n\nUntuk memverifikasi permintaan anda, silakan masukkan kode OTP berikut: {$otpCode}\n\nKode di atas hanya berlaku 5 menit. Mohon jangan sebarkan kode ini ke siapapun, termasuk pihak yang mengatasnamakan {$appName}.\nPesan ini dikirim secara otomatis oleh sistem. Mohon tidak membalas pesan ini.";
    }

    /**
     * success forgot password message
     */
    public function getSuccessForgotPasswordMsg($user, $appName)
    {
        return "Halo {$user},\n\nKata sandi anda pada {$appName} telah berhasil diatur ulang.\n\nMohon gunakan kata sandi baru untuk masuk ke akun anda.\n\nJika anda tidak merasa melakukan permintaan pengaturan ulang kata sandi, harap segera hubungi tim dukungan kami.\nPesan ini dikirim secara otomatis oleh sistem. Mohon tidak membalas pesan ini.";
    }

    /**
     * transaction message
     */
    public function getTransactionMsg($user, $appName, $transactionNumber, $transactionStatus, $notes)
    {
        $keterangan = empty($notes) ? '-' : $notes;

        return "Halo {$user},\n\nTransaksi anda dengan nomor {$transactionNumber} dalam status {$transactionStatus}.\nKeterangan: {$keterangan}\n\nTerima kasih telah berbelanja di {$appName}.\nPesan ini dikirim secara otomatis oleh sistem. Mohon untuk tidak membalas pesan ini.";
    }

    public function getTransactionMsgForAdmin($user, $appName, $transactionNumber, $transactionStatus, $notes)
    {
        $keterangan = empty($notes) ? '-' : $notes;

        $trxOptions = [
            '[MENUNGGU_PEMBAYARAN]' => "Halo \n\nAda transaksi baru dari {$user} dengan nomor transaksi {$transactionNumber}.\nKeterangan: {$keterangan}\n\nSilahkan cek aplikasi {$appName} ya.\nPesan ini dikirim otomatis oleh sistem, jadi jangan dibalas ya.",
            '[VALIDASI_PEMBAYARAN]' => "Halo \n\n{$user} baru saja melakukan pembayaran untuk transaksi {$transactionNumber}.\nKeterangan: {$keterangan}\n\nSilahkan cek aplikasi {$appName} ya.\nPesan ini dikirim otomatis oleh sistem, jadi jangan dibalas ya.",
            '[PESANAN_DIBATALKAN]' => "Halo \n\n{$user} baru saja membatalkan transaksi dengan nomor {$transactionNumber}.\nKeterangan: {$keterangan}\n\nSilahkan cek aplikasi {$appName} ya.\nPesan ini dikirim otomatis oleh sistem, jadi jangan dibalas ya.",

            '[MENUNGGU_KONFIRMASI_PESANAN]' => "Halo \n\nTransaksi dari {$user} dengan nomor transaksi {$transactionNumber} sedang menunggu konfirmasi pesanan.\nKeterangan: {$keterangan}\n\nSilahkan cek aplikasi {$appName} ya.\nPesan ini dikirim otomatis oleh sistem, jadi jangan dibalas ya.",
            '[PENGEMBALIAN_DANA]' => "Halo \n\nAda pengembalian dana untuk transaksi {$transactionNumber} atas nama {$user}.\nKeterangan: {$keterangan}\n\nSilahkan cek aplikasi {$appName} ya.\nPesan ini dikirim otomatis oleh sistem, jadi jangan dibalas ya.",
            '[PESANAN_DIPROSES]' => "Halo \n\nTransaksi dari {$user} dengan nomor transaksi {$transactionNumber} sedang diproses.\nKeterangan: {$keterangan}\n\nSilahkan cek aplikasi {$appName} ya.\nPesan ini dikirim otomatis oleh sistem, jadi jangan dibalas ya.",
            '[PESANAN_SIAP]' => "Halo \n\nTransaksi dari {$user} dengan nomor transaksi {$transactionNumber} sudah siap.\nKeterangan: {$keterangan}\n\nSilahkan cek aplikasi {$appName} ya.\nPesan ini dikirim otomatis oleh sistem, jadi jangan dibalas ya.",
            '[PESANAN_SELESAI]' => "Halo \n\nTransaksi dari {$user} dengan nomor transaksi {$transactionNumber} sudah selesai.\nKeterangan: {$keterangan}\n\nSilahkan cek aplikasi {$appName} ya.\nPesan ini dikirim otomatis oleh sistem, jadi jangan dibalas ya.",
        ];

        return isset($trxOptions[$transactionStatus]) ? $trxOptions[$transactionStatus] : "Halo optiX Administrator,\n\nAda Transaksi dengan nomor {$transactionNumber} dari {$user} dengan status {$transactionStatus}.\n\nPesan ini dikirim secara otomatis oleh sistem. Mohon untuk tidak membalas pesan ini.";;
    }
}
