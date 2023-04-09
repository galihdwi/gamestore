<?php

namespace app\libs\notification\template;

use app\libs\notification\TemplateNotificationInterface;

class MailTemplate implements TemplateNotificationInterface
{
    public function getRegisterVerificationMsg($user, $appName, $otpCode)
    {
        $html_template = '
        <!DOCTYPE html>
        <html>
        <body>
            <div style=\'width: 100%; height: 100%; background-color: #f2f2f2; padding: 20px 0;\'>
                <div style=\'width: 100%; max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px;\'>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <img src=\'http://dev.optix.id/img/optic.png\' alt=\'optiX\' style=\'width: 100px;\'>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <h1 style=\'font-size: 16px; font-weight: 600; color: #000;\'>Terima kasih telah mendaftar di ' . $appName . '.</h1>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Untuk memverifikasi akun Anda, silakan masukkan kode verifikasi berikut:</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <h1 style=\'font-size: 24px; font-weight: 600; color: #198754;\'>' . $otpCode . '</h1>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Kode di atas hanya berlaku 30 menit. Mohon jangan sebarkan kode ini ke siapapun, termasuk pihak yang mengatasnamakan  ' . $appName . '.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 12px; font-weight: 400; color: #000;\'>Email ini dikirim secara otomatis oleh sistem. Mohon tidak membalas email ini.</p>
                    </div>
                </div>
            </div>
        </body>

        </html>';

        return $html_template;
    }

    public function getForgotPasswordVerificationMsg($user, $appName, $otpCode)
    {
        $html_template = '
        <!DOCTYPE html>
        <html>
        <body>
            <div style=\'width: 100%; height: 100%; background-color: #f2f2f2; padding: 20px 0;\'>
                <div style=\'width: 100%; max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px;\'>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <img src=\'http://dev.optix.id/img/optic.png\' alt=\'optiX\' style=\'width: 100px;\'>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <h1 style=\'font-size: 16px; font-weight: 600; color: #000;\'>Permintaan untuk mengatur ulang kata sandi</h1>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Ini adalah pemberitahuan bahwa kami menerima permintaan untuk mengatur ulang kata sandi anda di ' . $appName . '.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Untuk memverifikasi permintaan anda, silakan masukkan kode verifikasi berikut:</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <h1 style=\'font-size: 24px; font-weight: 600; color: #198754;\'> ' . $otpCode . ' </h1>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 16px; font-weight: 400; color: #000;\'>Kode di atas hanya berlaku 5 menit. Mohon jangan sebarkan kode ini ke siapapun, termasuk pihak yang mengatasnamakan ' . $appName . '.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 12px; font-weight: 400; color: #000;\'>Email ini dikirim secara otomatis oleh sistem. Mohon tidak membalas email ini.</p>
                    </div>
                </div>
            </div>
        </body>
        </html>';

        return $html_template;
    }

    public function getSuccessRegisterMsg($user, $appName)
    {
        $html_template = '
        <!DOCTYPE html>
        <html>
        <body>
            <div style=\'width: 100%; height: 100%; background-color: #f2f2f2; padding: 20px 0;\'>
                <div style=\'width: 100%; max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px;\'>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <img src=\'http://dev.optix.id/img/optic.png\' alt=\'optiX\' style=\'width: 100px;\'>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <h1 style=\'font-size: 16px; font-weight: 600; color: #000;\'>Halo ' . $user . '</h1>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Selamat! Akun Anda telah berhasil diverifikasi.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Kini Anda dapat menikmati pengalaman belanja yang lebih aman dan nyaman di ' . $appName . '. Gunakan fitur-fitur yang tersedia untuk membuat pengalaman belanja Anda lebih menyenangkan.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Terima kasih telah bergabung di ' . $appName . '</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 12px; font-weight: 400; color: #000;\'>Email ini dikirim secara otomatis oleh sistem. Mohon tidak membalas email ini.</p>
                    </div>
                </div>
            </div>
        </body>
        </html>';

        return $html_template;
    }

    public function getSuccessForgotPasswordMsg($user, $appName)
    {
        $html_template = '
        <!DOCTYPE html>
        <html>
        <body>
            <div style=\'width: 100%; height: 100%; background-color: #f2f2f2; padding: 20px 0;\'>
                <div style=\'width: 100%; max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px;\'>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <img src=\'http://dev.optix.id/img/optic.png\' alt=\'optiX\' style=\'width: 100px;\'>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <h1 style=\'font-size: 16px; font-weight: 600; color: #000;\'>Halo ' . $user . '</h1>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Kata sandi Anda telah berhasil diatur ulang.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Mohon gunakan kata sandi baru untuk masuk ke akun Anda.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Jika Anda tidak merasa melakukan permintaan pengaturan ulang kata sandi, harap segera hubungi tim dukungan kami.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 12px; font-weight: 400; color: #000;\'>Email ini dikirim secara otomatis oleh sistem. Mohon untuk tidak membalas email ini.</p>
                    </div>
                </div>
            </div>
        </body>
        </html>';

        return $html_template;
    }

    public function getTransactionMsg($user, $appName, $transactionNumber, $transactionStatus, $notes)
    {
        $keterangan = empty($notes) ? '-' : $notes;

        $html_template = '
        <!DOCTYPE html>
        <html>
        <body>
            <div style=\'width: 100%; height: 100%; background-color: #f2f2f2; padding: 20px 0;\'>
                <div style=\'width: 100%; max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px;\'>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <img src=\'http://dev.optix.id/img/optic.png\' alt=\'optiX\' style=\'width: 100px;\'>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <h1 style=\'font-size: 16px; font-weight: 600; color: #000;\'>Halo ' . $user . '</h1>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Transaksi Anda dengan nomor ' . $transactionNumber . ' dalam status ' . $transactionStatus . '.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Keterangan: ' . $keterangan . '.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 14px; font-weight: 400; color: #000;\'>Terima kasih telah berbelanja di ' . $appName . '.</p>
                    </div>
                    <div style=\'width: 100%; text-align: left; margin-bottom: 20px;\'>
                        <p style=\'font-size: 12px; font-weight: 400; color: #000;\'>Email ini dikirim secara otomatis oleh sistem. Mohon untuk tidak membalas email ini.</p>
                    </div>
                </div>
            </div>
        </body>
        </html>';

        return $html_template;
    }

    public function getTransactionMsgForAdmin($user, $appName, $transactionNumber, $transactionStatus, $notes)
    {
        /**
         * implement later
         */
        $html_template = '';

        return $html_template;
    }
}
