<?php

namespace app\libs\helpers;

use Yii;

class CustomStringHelper
{
    public static function setPageTitle($title)
    {
        return $title . " | " . Yii::$app->name;
    }

    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function currencyFormat($number)
    {
        $currencyFormat = Yii::$app->formatter;
        $currencyFormat->currencyCode = 'IDR';
        $currencyFormat->thousandSeparator = '.';
        $currencyFormat->numberFormatterOptions = [
            \NumberFormatter::MIN_FRACTION_DIGITS => 0,
            \NumberFormatter::MAX_FRACTION_DIGITS => 0,
        ];
        return $currencyFormat->asCurrency($number);
    }

    public static function generateOTP()
    {
        return str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    public static function isPhone($params)
    {
        $res = false;
        if (preg_match('/^\d{10,15}$/', $params)) {
            $res = true;
        }

        return $res;
    }

    public static function isEmail($params)
    {
        $res = false;
        if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $params)) {
            $res = true;
        }

        return $res;
    }

    public static function truncate($string, $length = 100, $append = "...")
    {
        $string = trim($string);

        if (strlen($string) > $length) {
            $string = wordwrap($string, $length);
            $string = explode("\n", $string, 2);
            $string = $string[0] . $append;
        }

        return $string;
    }

    /**
     * convert thousand to RB, million to JT, billion to M
     */
    public static function terbilangNumber($number)
    {
        if ($number >= 1000000000) {
            $number = number_format(($number / 1000000000), 2) . 'M';
        } elseif ($number >= 1000000) {
            $number = number_format(($number / 1000000), 1) . 'JT';
        } elseif ($number >= 1000) {
            $number = number_format(($number / 1000), 0) . 'RB';
        }

        // null to 0
        if ($number == null) {
            $number = 0;
        }

        return $number;
    }

    /**
     * indonesia month name
     */
    public static function monthName($date, $fromFormat = null)
    {
        if (!empty($fromFormat)) {
            $month = \DateTime::createFromFormat($fromFormat, $date)->format('m');
        } else {
            $month = date('m', strtotime($date));
        }

        $monthName = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        return $monthName[$month];
    }

    /**
     * indonesia day name
     */
    public static function dayName($date, $fromFormat = null)
    {
        if (!empty($fromFormat)) {
            $day = \DateTime::createFromFormat($fromFormat, $date)->format('l');
        } else {
            $day = date('l', strtotime($date));
        }

        $dayName = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu',
            'Sunday' => 'Minggu',
        ];

        return $dayName[$day];
    }

    /**
     * Hari Tanggal Bulan Tahun Jam Menit
     */
    public static function dateTimeIdFormat($date, $fromFormat = null)
    {
        if (!empty($fromFormat)) {
            $dateTime = \DateTime::createFromFormat($fromFormat, $date);
            $day = self::dayName($date, $fromFormat);
            $result = $day . ', ' . $dateTime->format('d') . ' ' . self::monthName($date, $fromFormat) . ' ' . $dateTime->format('Y') . ' ' . $dateTime->format('H:i');
        } else {
            $day = self::dayName($date);
            $result = $day . ', ' . date('d', strtotime($date)) . ' ' . self::monthName($date) . ' ' . date('Y', strtotime($date)) . ' ' . date('H:i', strtotime($date));
        }

        return $result;
    }

    /**
     * convert thousand to RB, million to JT, billion to M
     */
    public static function minutesConverter($data)
    {
        $span = '<span class="text-success">';
        $res = '';
        if ($data >= 60) {
            $hours = $data / 60;
            $hour = number_format($hours, 1, ".", ".");

            if ($hours > 12) {
                $span = '<span class="text-danger">';
            } else if ($hours > 6 && $hours <= 12) {
                $span = '<span class="text-orange">';
            } else {
            }

            $res = $span . $hour . ' Jam</span><br><span class="text-xs text-secondary text-center">' . $data . ' Menit</span>';
        } elseif ($data > 0 && $data < 60) {
            $data = $data . ' Menit';
            $res = $span . $data . '</span>';
        } else {
            $data = '< 1 Menit';
            $res = $span . $data . '</span>';
        }

        return $res;
    }
}
