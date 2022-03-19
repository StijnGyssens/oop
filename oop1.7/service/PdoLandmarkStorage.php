<?php

class PdoLandmarkStorage implements LandmarkStorageInterface
{
    private $pdo;

    public function __construct( $pdo)
    {
        $this->pdo=$pdo;
    }

    public function fetchAllLandmarks()
    {
        $landmarkArray=$this->pdo->GetData('select * from landmark');
        return $landmarkArray;
    }

    public function fetchSingleLandmark($id)
    {
        $landmarkArray=$this->pdo->GetData('select * from landmark where id= '.$id);
        if(!$landmarkArray){
            return null;
        }
        return $landmarkArray;
    }
}