<?php

interface LandmarkStorageInterface
{
    public function fetchAllLandmarks();
    public function fetchSingleLandmark($id);
}