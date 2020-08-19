<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        //

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add('MAIN NAVIGATION');

            $event->menu->add([
                'text' => 'Games',
                'url' => '/games',
            ]);
            $event->menu->add([
                'text' => 'Player Profiles',
                'url' => '/profiles',
            ]);

            $event->menu->add([
                'text'    => 'GAME Data',
                'icon'    => 'fas fa-fw fa-share',
                'submenu' => [

                    [
                        'text' => 'Game Experience',
                        'url'  => '/game',
                    ]
                ]
            ]);
            $event->menu->add(['header' => 'account_settings']);
            $event->menu->add([
                'text' => 'Knowledge Components',
                'url' => '/knowledgeComponents',
            ]);
            $event->menu->add('SCENARIOS');
            $event->menu->add([
                'text' => 'Scenarios',
                'url' => '/scenarios',
            ]);
            $event->menu->add([
                'text' => 'Prefabs',
                'url' => '/prefabs',
            ]);


            $event->menu->add([
                'text' => 'Start game API',
                'icon_color' => 'cyan',
                'url' => '/api/game/start',
            ]);


        });
    }
}
