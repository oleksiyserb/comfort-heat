<?php


namespace app\components;


class StringHelper
{
    const LIMIT_TITLE = 80;
    const LIMIT_DESCRIPTION = 200;

    public static function getDescription($string, $limit = self::LIMIT_DESCRIPTION)
    {
        if(strlen($string) > $limit) {
            return mb_substr($string, 0, $limit, 'UTF-8') . '...';
        } else {
            return $string;
        }
    }

    public static function getTitle($string, $limit = self::LIMIT_TITLE)
    {
        if (strlen($string) > $limit) {
            return mb_substr($string, 0, $limit, 'UTF-8') . '...';
        } else {
            return $string;
        }
    }

}