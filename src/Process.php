<?php

namespace linkphp\process;

abstract class Process
{

    /**
     * pid文件
     * @var string $pid_file
     */
    protected static $pid_file_path = '/users/liujun/run/link-websocket.pid';

    /**
     * 做大进程数
     * @var integer $process_max_num
     */
    protected $process_max_num = 1;

    /**
     * 当前进程数
     * @var integer $process_num
     */
    protected $process_num = 0;

    /**
     * 当前进程数
     * @var Daemon
     */
    protected $daemon;

    public function __construct()
    {
        $class = 'linkphp\\process\\daemon\\Swoole';
        $this->daemon = $class;
    }

    abstract public function start($callback);

    abstract public static function stop();

    abstract public function restart();

    abstract public function signal($signo, $callback);

    abstract public static function kill($pid, $signo = SIGTERM);

    abstract public function wait();

    abstract public function alarm($interval_usec, $type = 0);

    abstract public function daemon();

    abstract public function getPid();

    abstract public static function getMasterPid($pidFile);

    abstract public static function setName($name);

    public function setPidFilePath($path)
    {
        self::$pid_file_path = $path;
        return $this;
    }

    public function setProcessMaxNum($num)
    {
        $this->process_max_num = $num;
        return $this;
    }

    // 写入 PID 文件
    public function writePid($pidFile)
    {
        $pid  = $this->getPid();
        $dir = dirname(self::$pid_file_path);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $file = fopen($pidFile, "w+");
        if (flock($file, LOCK_EX)) {
            fwrite($file, $pid);
            flock($file, LOCK_UN);
        } else {
            return false;
        }
        fclose($file);
        return true;
    }

    public function help(){}

}