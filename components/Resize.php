<?php

namespace app\components;

use Exception;

class Resize
{
    private $img;
    private $type;
    private $width;
    private $height;
    private $imgRes;

    /////////////////////config/////////////////////
    const WIDTH = 150;
    const HEIGHT = 100;
    const IMAGE_EXT = '.jpg';
    const DIR_SAVE = 'images';

    ////////////////////////////////////////////////

    public function __construct($path)
    {
        if (!file_exists($path)) {
            throw new Exception("Данного файла нет!");
        }

        $this->type = $this->getType($path);

        switch ($this->type) {
            case IMAGETYPE_JPEG :
                $img = imagecreatefromjpeg($path);
                break;

            case IMAGETYPE_GIF :
                $img = imagecreatefromgif($path);
                break;

            case IMAGETYPE_PNG :
                $img = imagecreatefrompng($path);
                break;

            case IMAGETYPE_BMP :
                $img = imagecreatefrombmp($path);
                break;

            default:
                $img = FALSE;
        }

        $this->img = $img;

        if (!$this->img) {
            throw new Exception("Не удалось создать дескриптор даного изображения");
        }

        $this->width = imagesx($this->img);
        $this->height = imagesy($this->img);

    }

    private function getType($path)
    {
        if (!function_exists('exif_imagetype')) {
            throw new Exception("Не подключено расширение exif");
        }

        return exif_imagetype($path);
    }

    public function resize($newWidth = self::WIDTH, $newHeight = self::HEIGHT, $option = 'width')
    {
        $arr = $this->getSizes($newWidth, $newHeight, $option);

        $this->imgRes = imagecreatetruecolor(round($arr['width']), round($arr['height']));

        imagecopyresampled($this->imgRes, $this->img, 0, 0, 0, 0, round($arr['width']), round($arr['height']), $this->width, $this->height);

        if ($option == 'crop') {
            $w = round($arr['width']);
            $h = round($arr['height']);

            $sx = ($w / 2) - ($newWidth / 2);
            $sy = ($h / 2) - ($newHeight / 2);

            $img = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($img, $this->imgRes, 0, 0, $sx, $sy, $newWidth, $newHeight,
                $newWidth, $newHeight);
            $this->imgRes = $img;
        }
    }

    private function getSizes($newWidth, $newHeight, $option)
    {
        switch ($option) {
            case 'width' :
                $width = $newWidth;
                $height = $this->getHeight($newWidth);
                break;

            case 'height' :
                $width = $this->getWidth($newHeight);
                $height = $newHeight;
                break;

            case 'auto':
                $arr = $this->getAuto($newWidth, $newHeight);
                $width = $arr[0];
                $height = $arr[1];
                break;

            case 'crop' :
                $arr = $this->getCrop($newWidth, $newHeight);
                $width = $arr['width'];
                $height = $arr['height'];
                break;

            case 'exact' :
                $width = $newWidth;
                $height = $newHeight;
                break;
        }

        return array(
            'width' => $width,
            'height' => $height
        );
    }

    private function getHeight($newWidth)
    {
        $k = $this->height / $this->width;
        return $newWidth * $k;
    }

    private function getWidth($newHeight)
    {
        $k = $this->width / $this->height;
        return $newHeight * $k;
    }

    private function getAuto($newWidth, $newHeight)
    {
        if ($this->width > $this->height) {
            $resWidth = $newWidth;
            $resHeight = $this->getHeight($newWidth);
        } elseif ($this->width < $this->height) {
            $resWidth = $this->getWidth($newHeight);
            $resHeight = $newHeight;
        } else {
            $resWidth = $newWidth;
            $resHeight = $newHeight;
        }
        return array($resWidth, $resHeight);
    }

    private function getCrop($newWidth, $newHeight)
    {
        $kh = $this->height / $newHeight;
        $kw = $this->width / $newWidth;

        if ($kh < $kw) {
            $res_k = $kh;
        } else {
            $res_k = $kw;
        }

        return array(
            'width' => ($this->width / $res_k),
            'height' => ($this->height / $res_k)
        );
    }

    public function save($path = FALSE, $quality = 100)
    {
        if(!$path) {
            $str = md5(microtime());
            $name = substr($str, 0, 10);
            $ext = self::IMAGE_EXT;
            $path = $name . $ext;
        } else {
            $ext = strtolower(strrchr($path, '.'));
        }

        switch($ext) {
            case '.jpg' :
                imagejpeg($this->imgRes, $path, $quality);
                break;

            case '.png' :
                $quality = round(($quality*9) /100);
                $quality = 9 - $quality;
                imagepng($this->imgRes, $path, $quality);
                break;

            case '.gif' :
                imagegif($this->imgRes, $path);
                break;
        }
        imagedestroy($this->imgRes);
        imagedestroy($this->img);
        return true;
    }


}


