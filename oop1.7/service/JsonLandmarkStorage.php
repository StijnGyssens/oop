<?php

class JsonLandmarkStorage implements LandmarkStorageInterface
{
    private $filename;

    public function __construct($jsonFilePath)
    {
        $this->filename = $jsonFilePath;
    }


    public function fetchAllLandmarks()
    {
        $jsonContents = file_get_contents($this->filename);

        return json_decode($jsonContents, true);
    }

    public function fetchSingleLandmark($id)
    {
        $landmarks = $this->fetchAllLandmarks();

        foreach ($landmarks as $landmark) {
            if ($landmark['id'] == $id) {
                return $landmark;
            }
        }

        return null;
    }
}