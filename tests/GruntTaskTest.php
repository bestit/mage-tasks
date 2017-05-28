<?php

namespace BestIt\MageTasks\Tests;

use BestIt\MageTasks\GruntTask;
use PHPUnit\Framework\TestCase;

/**
 * Check for GruntTask.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks\Tests
 */
class GruntTaskTest extends TestCase
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
            [['grunt']],
            [['grunt watch'], ['task' => 'watch']],
            [['node_modules/.bin/grunt'], ['path' => 'node_modules/.bin/grunt']],
            [['node_modules/.bin/grunt watch'], ['path' => 'node_modules/.bin/grunt', 'task' => 'watch']]
        ];
    }

    /**
     * Returns the fqcn of the task class.
     * @return string
     */
    protected function getTaskClass(): string
    {
        return GruntTask::class;
    }

    /**
     * Returns the task description.
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return string
     */
    protected function getTaskDescription(array $checkCommands, array $options = []): string
    {
        return '[grunt] ' . (@$options['task'] ? ('run task "' . $options['task'] . '"') : 'task runner');
    }

    /**
     * Returns the task Name.
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return string
     */
    protected function getTaskName(array $checkCommands, array $options = []): string
    {
        return 'grunt';
    }
}
