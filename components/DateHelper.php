<?php

namespace app\components;

class DateHelper
{
    public static function getDate($stamp)
    {
        $strTime = $stamp;

        $_monthsList = array(".01." => "січень", ".02." => "лютий",
            ".03." => "березень", ".04." => "квітень", ".05." => "травень", ".06." => "червень",
            ".07." => "липень", ".08." => "серпень", ".09." => "вересень",
            ".10." => "жовтень", ".11." => "листопад", ".12." => "грудень");

        $data = date('d', $strTime) . ' ' . $_monthsList[date('.m.', $strTime)]
            . ' ' . date('Y', $strTime) . 'г.';

        return $data;
    }


    public static function getTime($stamp)
    {
        $strTime = $stamp;

        $data = date('H', $strTime) . ':' . date('i', $strTime). ':' .date('s', $strTime);

        return $data;
    }


    public static function getDateInteger($stamp)
    {
        $strTime = $stamp;

        $data = date('d', $strTime) . '/' . date('m', $strTime)
            . '/' . date('Y', $strTime) ;

        return $data;
    }


    public static function correctName($int, $type)
    {
        switch ($type) {
            case 'day':
                if ($int == 11 || $int == 12 || $int == 13 || $int == 14) {
                    $word = ' дней';
                } else {
                    $int = mb_substr($int, -1);
                    if ($int == 1) {
                        $word = ' день';
                    }

                    if ($int == 2 || $int == 3 || $int == 4){
                        $word = ' дня';
                    } else {
                        $word = ' дней';
                    }
                }
                break;

            case 'hours':
                if ($int == 11 || $int == 12 || $int == 13 || $int == 14) {
                    $word = ' часов';
                } else {
                    $int = mb_substr($int, -1);
                    if ($int == 1) {
                        $word = ' час';
                    }

                    if ($int == 2 || $int == 3 || $int == 4){
                        $word = ' часа';
                    } else {
                        $word = ' часов';
                    }
                }
                break;

            case 'minut':
                if ($int == 11 || $int == 12 || $int == 13 || $int == 14) {
                    $word = ' минут';
                } else {
                    $int = mb_substr($int, -1);
                    if ($int == 1) {
                        $word = ' минута';
                    }

                    if ($int == 2 || $int == 3 || $int == 4){
                        $word = ' минуты';
                    } else {
                        $word = ' минут';
                    }
                }
                break;

            case 'second':
                if ($int == 11 || $int == 12 || $int == 13 || $int == 14) {
                    $word = ' секунд';
                } else {
                    $int = mb_substr($int, -1);
                    if ($int == 1) {
                        $word = ' секунда';
                    }

                    if ($int == 2 || $int == 3 || $int == 4){
                        $word = ' секунды';
                    } else {
                        $word = ' секунд';
                    }
                }
                break;

            default:
                $word = ' неизвестно чего';

        }

        return $word;
    }


}


