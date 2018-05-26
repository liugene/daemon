<?php

namespace linkphp\process;

abstract class Daemon
{

    /**
     * pid文件
     * @var string $pid_file
     */
    private $pid_file_path;

    public function setPidFilePath($path)
    {
        $this->pid_file_path = $path;
        return $this;
    }

    abstract public function daemon();

}
