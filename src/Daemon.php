<?php

namespace linkphp\daemon;

class Daemon
{

    private $pid_file;

    private $pid;

    public function setPidFile(){}

    public function setWork(){}

    private function daemon()
    {
        $pid = pcntl_fork();
        if($pid == 0){
            /**
             * 这是子进程
             */
        } else if($pid > 0) {
        } else {
            /**
             * 创建失败
             */
        }
    }

    private function start(){}

    private function stop(){}

    private function help(){}

    private function restart(){}

}
