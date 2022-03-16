<?php

class Container
{
    private $config;
    private $loader;
    private $dbm;
    private $logger;
    private $ms;

    public function __construct(array $config)
    {
        $this->config=$config;
    }

    /**
     * @return Logger
     */
    public function getLogger()
    {
        $this->logger= new Logger();
        return $this->logger;
    }

    /**
     * @return DBManager
     */
    public function getDBM()
    {
        $this->dbm=new DBManager($this->config,$this->getLogger());
        return $this->dbm;
    }

    /**
     * @return MessageService
     */
    public function getMS()
    {
        $this->ms = new MessageService();
        return $this->ms;
    }

    /**
     * @param array $rows
     * @return CityLoader
     */
    public function getLoader(array $rows)
    {
        $this->loader= new CityLoader($rows);
        return $this->loader;
    }
}