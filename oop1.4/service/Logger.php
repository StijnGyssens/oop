<?php

class Logger
{
    private $fp;
    private $logfile;

    public function __constructor(){
        $this->fp = fopen($_SERVER["DOCUMENT_ROOT"] . "\oop1.4\log\log.txt","c+");
        $this->logfile="log.txt";
    }

    public function Log($msg){
        var_dump($this->fp); //geeft NULL terug
        print "<br/>";
        var_dump(fopen($_SERVER["DOCUMENT_ROOT"] . "\oop1.4\log\log.txt","c+"));//geeft resource(18) of type (stream) terug
        fwrite($this->fp,date("d-m-Y H:i:s").': '.$msg.'\r\n' );
    }

    public function ShowLog(){
        return file_get_contents($this->logfile);
    }

}