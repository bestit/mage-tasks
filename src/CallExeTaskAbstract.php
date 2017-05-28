<?php

namespace BestIt\MageTasks;

use Mage\Task\AbstractTask;

/**
 * Task abstract for getting an configurable path for calling an exe.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks
 */
abstract class CallExeTaskAbstract extends AbstractTask
{
    /**
     * Returns the config key for the task.
     * @return string
     */
    protected function getConfigKey()
    {
        return basename($this->getName());
    }

    /**
     * Returns the default options for this task.
     * @return array
     */
    protected function getDefaultOptions()
    {
        return [];
    }

    /**
     * Returns the default path for this executable.
     * @return string
     */
    abstract protected function getDefaultPath();

    /**
     * Returns the options.
     * @return array
     */
    protected function getOptions()
    {
        $options = array_merge(
            ['path' => $this->getDefaultPath()],
            $this->getDefaultOptions(),
            $this->runtime->getMergedOption($this->getConfigKey()),
            $this->options
        );

        return $options;
    }
}
