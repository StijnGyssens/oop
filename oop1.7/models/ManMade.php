<?php

class ManMade extends Landmark
{
    private $builder;
    private $buildYear;

    public function getType()
    {
        return "Man made";
    }

    /**
     * @return mixed
     */
    public function getBuilder()
    {
        return $this->builder;
    }

    /**
     * @param mixed $builder
     */
    public function setBuilder($builder): void
    {
        $this->builder = $builder;
    }

    /**
     * @return mixed
     */
    public function getBuildYear()
    {
        return $this->buildYear;
    }

    /**
     * @param mixed $buildYear
     */
    public function setBuildYear($buildYear): void
    {
        $this->buildYear = $buildYear;
    }


}