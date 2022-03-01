<?php

namespace RmBased\Modules\Providers;

use Illuminate\Support\ServiceProvider;
use RmBased\Modules\Contracts\RepositoryInterface;
use RmBased\Modules\Laravel\LaravelFileRepository;

class ContractsServiceProvider extends ServiceProvider
{
    /**
     * Register some binding.
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, LaravelFileRepository::class);
    }
}
