<?php

namespace BestIt\MageTasks\Tests;

use BestIt\MageTasks\Tests\Task\BaseCallExeTask;
use PHPUnit\Framework\TestCase;

/**
 * Check for BaseCallExeTaskTask.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks\Tests
 */
class BaseCallExeTaskTaskTest extends TestCase
{
    use TaskTestTrait;

    /**
     * Gets some checks as the data provider. The first element are the called commands and the second are the options.
     * @return array
     */
    public function getExecuteCallChecks(): array
    {
        return [
            // check commands, the options
            [['phpunit --version']],
            [['vendor/bin/phpunit --version'], ['path' => 'vendor/bin/phpunit']]
        ];
    }

    /**
     * Returns the fqcn of the task class.
     * @return string
     */
    protected function getTaskClass(): string
    {
        return BaseCallExeTask::class;
    }

    /**
     * Returns the task description.
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return string
     */
    protected function getTaskDescription(array $checkCommands, array $options = []): string
    {
        return '[phpunit] version';
    }

    /**
     * Returns the task Name.
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return string
     */
    protected function getTaskName(array $checkCommands, array $options = []): string
    {
        return 'phpunit/version';
    }
}
