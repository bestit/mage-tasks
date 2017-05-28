<?php

namespace BestIt\MageTasks\Npm;

use BestIt\MageTasks\CallExeTaskAbstract;
use Mage\Task\AbstractTask;

/**
 * The basic npm task.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks\Npm
 */
abstract class AbstractNpmTask extends CallExeTaskAbstract
{
    /**
     * Returns the special npm options per task.
     * @return array
     */
    protected function getDefaultOptions(): array
    {
        return ['flags' => '', 'timeout' => 120];
    }

    /**
     * Returns the default path for this executable.
     * @return string
     */
    protected function getDefaultPath(): string
    {
        return 'npm';
    }
}
