<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function getLogDir(): string
    {
        // Lorsque vous êtes sur Lambda, seul /tmp est accessible en écriture
        if (getenv('LAMBDA_TASK_ROOT') !== false) {
            return '/tmp/log/';
        }

        // Si vous n'êtes pas sur Lambda, utilisez le répertoire de log par défaut
        return $this->getProjectDir() . '/var/log';

    }    

    public function getCacheDir(): string
        {
        // When on the lambda only /tmp is writeable
        if (getenv('LAMBDA_TASK_ROOT') !== false) {
            return '/tmp/cache/'.$this->environment;
        }

        return parent::getCacheDir();
    }

}
