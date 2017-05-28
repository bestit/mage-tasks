<?php

namespace BestIt\MageTasks\Tests\Npm;

use BestIt\MageTasks\Npm\ShrinkwrapTask;
use BestIt\MageTasks\Tests\TaskTestTrait;
use PHPUnit\Framework\TestCase;

/**
 * Check for ShrinkwrapTask.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks\Tests\Npm
 */
class ShrinkwrapTaskTest extends TestCase
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
            [['npm shrinkwrap']]
        ];
    }

    /**
     * Returns the fqcn of the task class.
     * @return string
     */
    protected function getTaskClass(): string
    {
        return ShrinkwrapTask::class;
    }

    /**
     * Returns the task description.
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return string
     */
    protected function getTaskDescription(array $checkCommands, array $options = []): string
    {
        return '[npm] Shrinkwrap';
    }

    /**
     * Returns the task Name.
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return string
     */
    protected function getTaskName(array $checkCommands, array $options = []): string
    {
        return 'npm/shrinkwrap';
    }
}
