<?php

namespace linkphp\process;

class Daemon
{

    private $pid_file;

    private $pid;

    private $process_num;

    public function setProcessNum($number)
    {
        $this->process_num = $number;
        return $this;
    }

    public function setPidFile(){}

    public function setWork(){}

    public function run()
    {
        pcntl_signal(SIGTERM,[__CLASS__,'signalHandle'],false);
    }

    private function signalHandle(){}

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

    private function stop()
    {
        if(file_exists($this->pid_file)){
            unlink($this->pid_file);
        }
        posix_kill(0,SIGKILL);
        exit(0);
    }

    private function help(){}

    private function restart(){}

}
