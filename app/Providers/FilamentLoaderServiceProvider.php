<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\ServiceProvider;

class FilamentLoaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->navigation();
    }

    /**
     * function navigation
     *
     * @return void
     */
    public function navigation(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label(__('general.groups.composicoes'))
                    // ->icon('heroicon-s-puzzle')
                    ->collapsed(),

                NavigationGroup::make()
                    ->label(__('general.groups.insumos'))
                    // ->icon('heroicon-s-cube')
                    ->collapsed(),

                NavigationGroup::make()
                    ->label(__('general.groups.tabelas'))
                    // ->icon('heroicon-s-cube')
                    ->collapsed(),

                NavigationGroup::make()
                    ->label(__('general.groups.access'))
                    // ->icon('heroicon-s-cube')
                    ->collapsed(),
            ]);
        });
    }
}
