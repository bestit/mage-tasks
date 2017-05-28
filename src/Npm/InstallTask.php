<?php

namespace BestIt\MageTasks\Npm;

use Symfony\Component\Process\Process;

/**
 * The npm install task.
 * @author blange <lange@bestit-online.de>
 * @package BestIt\MageTasks\Npm
 */
class InstallTask extends AbstractNpmTask
{
    /**
     * Returns the name.
     * @return string
     */
    public function getName(): string
    {
        return 'npm/install';
    }

    /**
     * Returns the description.
     * @return string
     */
    public function getDescription(): string
    {
        return '[npm] Install';
    }

    /**
     * Executes the command.
     * @return bool
     */
    public function execute(): bool
    {
        $options = $this->getOptions();
        $cmd = sprintf('%s install %s', $options['path'], $options['flags']);

        /** @var Process $process */
        $process = $this->runtime->runCommand(trim($cmd), $options['timeout']);

        return $process->isSuccessful();
    }
}
