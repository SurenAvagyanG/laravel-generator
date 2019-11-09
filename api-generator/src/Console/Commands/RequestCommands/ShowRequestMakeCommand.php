<?php

namespace Fifth\Generator\Commands\RequestCommands;

use Fifth\Generator\Commands\MainMakeCommand;

class ShowRequestMakeCommand extends MainMakeCommand
{
    protected $name = 'make:showRequest';

    protected $description = 'Make ShowRequest for given Model';

    protected $type = 'ShowRequest';

    protected function getClassName()
    {
        return "ShowRequest";
    }

    protected function getStub()
    {
        return __DIR__.'/stubs/showRequest.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\Requests'.'\\'.$this->argument('name');
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        $stub = $this->replaceClassInstance($stub, $name);

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    protected function replaceClassInstance($stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);

        return str_replace('dummyClass', strtolower($class), $stub);
    }
}