<?php

namespace Ahmdrv\MekariSign;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ahmdrv\MekariSign\Commands\MekariSignCommand;

class MekariSignServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('mekarisign')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_mekarisign_table')
            ->hasCommand(MekariSignCommand::class);
    }
}
