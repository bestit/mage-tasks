<?php

namespace BestIt\MageTasks\Tests;

use BestIt\MageTasks\PHPUnitTask;
use PHPUnit\Framework\TestCase;

/**
 * Check for PHPUnitTask.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks\Tests
 */
class PHPUnitTaskTest extends TestCase
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
            [['phpunit']],
            [['phpunit ClassTest.php'], ['test' => 'ClassTest.php']],
            [['vendor/bin/phpunit'], ['path' => 'vendor/bin/phpunit']],
            [['vendor/bin/phpunit ClassTest.php'], ['path' => 'vendor/bin/phpunit', 'test' => 'ClassTest.php']],
        ];
    }

    /**
     * Returns the fqcn of the task class.
     * @return string
     */
    protected function getTaskClass(): string
    {
        return PHPUnitTask::class;
    }

    /**
     * Returns the task description.
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return string
     */
    protected function getTaskDescription(array $checkCommands, array $options = []): string
    {
        return '[phpunit] test runner';
    }

    /**
     * Returns the task Name.
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return string
     */
    protected function getTaskName(array $checkCommands, array $options = []): string
    {
        return 'phpunit';
    }
}
