<?php

namespace BestIt\MageTasks\Tests\Task;

use BestIt\MageTasks\CallExeTaskAbstract;

/**
 * Basic Test class.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks\Tests\Task
 */
class BaseCallExeTask extends CallExeTaskAbstract
{
    /**
     * Executes the Command
     * @return bool
     */
    public function execute(): bool
    {
        $options = $this->getOptions();

        $cmd = sprintf('%s %s', $options['path'], '--version');

        $process = $this->runtime->runCommand(trim($cmd), $options['timeout']);

        return $process->isSuccessful();
    }

    /**
     * Returns the special npm options per task.
     * @return array
     */
    protected function getDefaultOptions(): array
    {
        return ['timeout' => 120];
    }

    /**
     * Returns the default path for this executable.
     * @return string
     */
    protected function getDefaultPath(): string
    {
        return 'phpunit';
    }

    /**
     * Get a short Description of the Task
     * @return string
     */
    public function getDescription(): string
    {
        return '[phpunit] version';
    }

    /**
     * Get the Name/Code of the Task
     * @return string
     */
    public function getName(): string
    {
        return 'phpunit/version';
    }
}
