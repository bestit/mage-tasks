<?php

namespace BestIt\MageTasks\Tests;

use Mage\Task\AbstractTask;
use Mage\Tests\Runtime\RuntimeMockup;

/**
 * Helps testing the tasks.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks\Tests
 */
trait TaskTestTrait
{
    /**
     * Gets some checks as the data provider. The first element are the called commands and the second are the options.
     * @return array
     */
    abstract public function getExecuteCallChecks(): array;

    /**
     * Returns the tested task.
     * @return AbstractTask
     */
    protected function getTask(): AbstractTask
    {
        /** @var AbstractTask $task */
        $class = $this->getTaskClass();

        return new $class;
    }

    /**
     * Returns the fqcn of the task class.
     * @return string
     */
    abstract protected function getTaskClass(): string;

    /**
     * Returns the task description.
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return string
     */
    abstract protected function getTaskDescription(array $checkCommands, array $options = []): string;

    /**
     * Returns the task Name.
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return string
     */
    abstract protected function getTaskName(array $checkCommands, array $options = []): string;

    /**
     * Checks the execute call using the given options and checking against the check commands.
     * @dataProvider getExecuteCallChecks
     * @param array $checkCommands Which command should be run?
     * @param array $options Which options should be used?
     * @return void
     */
    public function testExecute(array $checkCommands, array $options = [])
    {
        $runtime = new RuntimeMockup();

        $runtime
            ->setConfiguration(['environments' => ['test' => []]])
            ->setEnvironment('test');

        $task = $this->getTask();

        $task
            ->setOptions($options)
            ->setRuntime($runtime);

        static::assertEquals($this->getTaskDescription($checkCommands, $options), $task->getDescription());
        static::assertEquals($this->getTaskName($checkCommands, $options), $task->getName());

        $task->execute();

        $ranCommands = $runtime->getRanCommands();

        static::assertCount(count($checkCommands), $ranCommands);

        // Check Generated Commands
        foreach ($checkCommands as $index => $command) {
            static::assertEquals($command, $ranCommands[$index]);
        }
    }

    /**
     * Checks the basic interface.
     * @return void
     */
    public function testBaseClass()
    {
        static::assertInstanceOf(AbstractTask::class, $this->getTask());
    }
}
