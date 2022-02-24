<?php


class CityLoader
{
    private $rows;

    public function __construct($rows)
    {
        $this->rows = $rows;
    }

    /**
     * @return City
     */
    public function getCity()
    {
        $city= $this->createCityFromData($this->rows[0]);
        return $city;
    }

    /**
     * @param $data
     * @return City
     */
    private function createCityFromData($data)
    {
        $city = new City();
        $city->setImgId($data['img_id']);
        $city->setImgTitle($data['img_title']);
        $city->setImgFilename($data['img_filename']);
        $city->setImgHeight($data['img_height']);
        $city->setImgWidth($data['img_width']);
        $city->setImgLanId($data['img_lan_id']);
        return $city;
    }

}