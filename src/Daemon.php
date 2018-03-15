<?php

namespace linkphp\process;

class Daemon
{

    /**
     * pid文件
     * @var string $pid_file
     */
    private $pid_file_path;

    /**
     * 做大进程数
     * @var integer $process_max_num
     */
    private $process_max_num;

    /**
     * 当前进程数
     * @var integer $process_num
     */
    private $process_num = 0;

    public function setProcessNum($number)
    {
        $this->process_max_num = $number;
        return $this;
    }

    public function setPidFilePath($path)
    {
        $this->pid_file_path = $path;
        return $this;
    }

    public function setWork(){}

    public function run()
    {
        pcntl_signal(SIGTERM,[__CLASS__,'signalHandle'],false);
    }

    private function signalHandle(){}

    private function daemon()
    {
        if($this->process_num<$this->process_max_num){
            $pid = pcntl_fork();
        }
        if($pid == 0){
            /**
             * 这是子进程
             */
        } else if($pid > 0) {
            exit(0);
        } else {
            /**
             * 创建失败
             */
            die('failed');
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
