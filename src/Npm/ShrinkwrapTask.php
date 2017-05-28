<?php

namespace BestIt\MageTasks\Npm;

use Symfony\Component\Process\Process;

/**
 * Writes the npm shrinkwrap file for your setup.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks\Npm
 */
class ShrinkwrapTask extends AbstractNpmTask
{
    /**
     * Returns the name.
     * @return string
     */
    public function getName()
    {
        return 'npm/shrinkwrap';
    }

    /**
     * Returns the description.
     * @return string
     */
    public function getDescription()
    {
        return '[npm] Shrinkwrap';
    }

    /**
     * Executes the command.
     * @return bool
     */
    public function execute()
    {
        $options = $this->getOptions();
        $cmd = sprintf('%s shrinkwrap %s', $options['path'], $options['flags']);

        /** @var Process $process */
        $process = $this->runtime->runCommand(trim($cmd), $options['timeout']);

        return $process->isSuccessful();
    }
}
