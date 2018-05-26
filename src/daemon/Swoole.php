<?php

namespace linkphp\process\daemon;

use linkphp\process\Daemon;
use swoole_process;

class Swoole extends Daemon
{

    public function daemon()
    {
        swoole_process::daemon($nochdir = true, $noclose = true);
    }

}