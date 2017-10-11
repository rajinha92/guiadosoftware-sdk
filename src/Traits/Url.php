<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 14:38
 */

namespace GuiaDoSoftwareSdk\Traits;


trait Url
{

    protected $guiaUrl    = 'http://guiadosoftware.com';
    protected $scaledPath = '/image/scaled/';

    public function getFile($filePath)
    {
        if ($filePath[0] != '/')
            $filePath = '/' . $filePath;

        return $this->guiaUrl . $filePath;
    }

    public function getImage($imagePath)
    {
        if ($imagePath[0] != '/')
            $imagePath = '/' . $imagePath;

        return $this->guiaUrl . $imagePath;
    }

    public function getScaledImage($imagePath, $width, $height)
    {
        if ($imagePath[0] == '/')
            $imagePath = substr($imagePath, 1);

        return sprintf('%s%s%s/%s?path=%s', $this->guiaUrl, $this->scaledPath, $width, $height, $imagePath);
    }

}