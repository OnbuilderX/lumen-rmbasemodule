<?php

namespace RmBased\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use RmBased\Modules\Commands\ControllerMakeCommand;
use RmBased\Modules\Commands\DisableCommand;
use RmBased\Modules\Commands\EnableCommand;
use RmBased\Modules\Commands\InstallCommand;
use RmBased\Modules\Commands\ListCommand;
use RmBased\Modules\Commands\ModelMakeCommand;
use RmBased\Modules\Commands\ModuleMakeCommand;
use RmBased\Modules\Commands\ProviderMakeCommand;
use RmBased\Modules\Commands\ResourceMakeCommand;
use RmBased\Modules\Commands\RouteProviderMakeCommand;
use RmBased\Modules\Commands\SetupCommand;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Namespace of the console commands
     * @var string
     */
    protected $consoleNamespace = "RmBased\\Modules\\Commands";

    /**
     * The available commands
     * @var array
     */
    protected $commands = [
        ControllerMakeCommand::class,
        DisableCommand::class,
        EnableCommand::class,
        InstallCommand::class,
        ListCommand::class,
        ModelMakeCommand::class,
        ModuleMakeCommand::class,
        ProviderMakeCommand::class,
        ResourceMakeCommand::class,
        RouteProviderMakeCommand::class,
        SetupCommand::class,
    ];

    public function register(): void
    {
        $this->commands($this->resolveCommands());
    }

    private function resolveCommands(): array
    {
        $commands = [];

        foreach (config('modules.commands', $this->commands) as $command) {
            $commands[] = Str::contains($command, $this->consoleNamespace) ?
                $command :
                $this->consoleNamespace . "\\" . $command;
        }

        return $commands;
    }

    public function provides(): array
    {
        return $this->commands;
    }
}
