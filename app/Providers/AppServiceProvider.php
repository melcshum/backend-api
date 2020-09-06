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
                'text'    => 'GAME Statistic and Analytics',
                'icon'    => 'fas fa-fw fa-share',
                'submenu' => [

                    [
                        'text' => 'Game Raw Data',
                        'url'  => '/experience',
                    ],
                    [
                        'text' => 'Default Time vs Average Play Time',
                        'url'  => '/timestatistic',
                    ]
                ]
            ]);

            $event->menu->add([

                'text' => 'Difficulty Trace',
                'url'  => '/traces',

            ]);
            $event->menu->add([

                'text' => 'Player Data Visualization',
                'url'  => '/chart',

            ]);

            // $event->menu->add(['header' => 'Game_settings']);
            $event->menu->add([
                'text'    => 'GAME Setting',
                'icon'    => 'fas fa-fw fa-share',
                'submenu' => [

                    [
                        'text' => 'Knowledge Components',
                        'url' => '/knowledgeComponents',
                    ],
                    [
                        'text' => 'Scenarios',
                        'url' => '/scenarios',
                    ],
                    [
                        'text' => 'Prefabs',
                        'url' => '/prefabs',
                    ],
                    [
                        'text' => 'Start game API',
                        'icon_color' => 'cyan',
                        'url' => '/api/game/start',

                    ]
                ]
            ]);
        });
    }
}
