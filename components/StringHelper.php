<?php


namespace app\components;


class StringHelper
{
    const LIMIT_TITLE = 60;
    const LIMIT_DESCRIPTION = 200;

    public static function getShortDescription($string, $limit = self::LIMIT_DESCRIPTION)
    {
        if(strlen($string) > $limit) {
            return mb_substr($string, 0, $limit, 'UTF-8') . '...';
        } else {
            return $string;
        }
    }

    public static function getShortTitle($string, $limit = self::LIMIT_TITLE)
    {
        if (strlen($string) > $limit) {
            return mb_substr($string, 0, $limit, 'UTF-8') . '...';
        } else {
            return $string;
        }
    }

}