<?php

class Logger
{
    private $fp;
    private $logfile;

    public function __construct(){
        $this->setFp(fopen($_SERVER["DOCUMENT_ROOT"] . "\oop1.4\log\log.txt","a+")) ;
        $this->logfile=$_SERVER["DOCUMENT_ROOT"] . "\oop1.4\log\log.txt";
    }

    public function Log($msg){
        fwrite($this->fp,date("d-m-Y H:i:s").': '.$msg.'\r\n' );
    }

    public function ShowLog(){
        return file_get_contents($this->logfile);
    }

    /**
     * @return mixed
     */
    public function getFp()
    {
        return $this->fp;
    }

    /**
     * @param mixed $fp
     */
    public function setFp($fp): void
    {
        $this->fp = $fp;
    }

    /**
     * @return mixed
     */
    public function getLogfile()
    {
        return $this->logfile;
    }

    /**
     * @param mixed $logfile
     */
    public function setLogfile($logfile): void
    {
        $this->logfile = $logfile;
    }


}