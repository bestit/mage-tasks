<?php

namespace BestIt\MageTasks;

/**
 * The task for the grunt task runner ;)
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks
 */
class GruntTask extends CallExeTaskAbstract
{
    /**
     * Executes the Command
     * @return bool
     */
    public function execute(): bool
    {
        $options = $this->getOptions();

        $cmd = sprintf('%s %s', $options['path'], $options['task']);

        $process = $this->runtime->runCommand(trim($cmd), $options['timeout']);

        return $process->isSuccessful();
    }

    /**
     * Returns the default options for this task.
     * @return array
     */
    protected function getDefaultOptions(): array
    {
        return [
            'task' => '',
            'timeout' => 300
        ];
    }

    /**
     * Returns the default path for this executable.
     * @return string
     */
    protected function getDefaultPath(): string
    {
        return 'grunt';
    }

    /**
     * Get a short Description of the Task
     * @return string
     */
    public function getDescription(): string
    {
        $options = $this->getOptions();

        return '[grunt] ' . (@$options['task'] ? ('run task "' . $options['task'] . '"') : 'task runner');
    }

    /**
     * Get the Name/Code of the Task
     * @return string
     */
    public function getName(): string
    {
        return 'grunt';
    }
}
