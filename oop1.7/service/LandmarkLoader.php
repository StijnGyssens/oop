<?php

class LandmarkLoader
{
    private $landmarkStorage;

    public function __construct(LandmarkStorageInterface $landmarkStorage)
    {
        $this->landmarkStorage=$landmarkStorage;
    }

    public function getLandmark()
    {
        $landmarksData= $this->landmarkStorage->fetchAllLandmarks();
        $landmarks=[];
        foreach ($landmarksData as $landmarkData)
        {
            $landmarks[]=$this->createLandmarkFromData($landmarkData);
        }
        return $landmarks;
    }

    public function createLandmarkFromData(array $landmarkData)
    {
        if($landmarkData['type']==='manmade')
        {
            $landmark= new ManMade($landmarkData['landmark']);
            $landmark->setBuilder($landmarkData['builder']);
            $landmark->setBuildYear($landmarkData['buildYear']);
        } else{
            $landmark = new Natural($landmarkData['landmark']);
        }
        $landmark->setId($landmarkData['landmarkID']);
        $landmark->setDescription($landmarkData['description']);
        $landmark->setImg($landmarkData['imgUrl']);
        $landmark->setLocation($landmarkData['locationId']);
        $landmark->setRates($landmarkData['rates']);
        return $landmark;
    }
}