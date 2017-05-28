<?php

namespace BestIt\MageTasks;

/**
 * PHPUnit test runner.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks
 */
class PHPUnitTask extends CallExeTaskAbstract
{
    /**
     * Executes the Command
     * @return bool
     */
    public function execute(): bool
    {
        $options = $this->getOptions();
        $test = $options['test'];

        $cmd = sprintf('%s %s %s', $options['path'], $test, $options['options']);

        $process = $this->runtime->runCommand(trim($cmd), $options['timeout']);

        return $process->isSuccessful();
    }

    /**
     * Returns the special npm options per task.
     * @return array
     */
    protected function getDefaultOptions(): array
    {
        return ['options' => '', 'test' => '', 'timeout' => 120];
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
        return '[phpunit] test runner';
    }

    /**
     * Get the Name/Code of the Task
     * @return string
     */
    public function getName(): string
    {
        return 'phpunit';
    }
}
