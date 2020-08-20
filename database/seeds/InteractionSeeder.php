<?php

use Illuminate\Database\Seeder;
use App\Interaction;
use Faker\Generator as Faker;

class InteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        factory(Interaction::class, 20)->create()
            ->each(function ($i) {

                $verblist = [
                    'Accessible' => ['Accessed', 'Skipped'],
                    'Alternative' => ['Selected', 'Unlocked'],
                    'Completable' => ['Accessed', 'Skipped'],
                    'GameObject' => ['Accessed', 'Skipped'],
                ];
                $cardName = App\Scenario::all('name')->random();

                $i->interaction_actor()
                    ->save(
                        factory('App\InteractionActor')->make(["name" => $i->name])
                    );

                $verbs = $verblist[$i->type];
                $i->interaction_action()->save(
                    factory('App\InteractionAction')->make(["name" => collect($verbs)->random()])
                );
                $cardName = "http://localhost/scenarios/name/" . App\Scenario::all('name')->random()->name;
                $i->interaction_object()
                    ->save(
                        factory(App\InteractionObject::class)->make(['name' => 'quest'])
                    )->interaction_definition()
                    ->save(
                        factory(App\InteractionDefinition::class)->make(['name' => $cardName])
                    );

                $i->interaction_result()
                    ->save(
                        factory(App\InteractionResult::class)->make()
                    )->interaction_extensions()
                    ->saveMany(factory(App\InteractionExtension::class, 3)->make());
            });



        // $i = new Interaction;
        // $i->name = "Test Name";
        // $i->save();


        // $a = new InteractionAction;
        // $a->verb = "Test Name";
        // $i->interaction_action()->save($a);

        // $this->call(UsersTableSeeder::class);

        // factory(App\Interaction::class, 10)->create()
        //     ->each(function ($i) {
        //         $i->interaction_actor()
        //             ->save(
        //                 factory(App\InteractionActor::class)->make()
        //             );
        //         $i->interaction_action()
        //             ->save(
        //                 factory(App\InteractionAction::class)->make()
        //             );

        //         $i->interaction_object()
        //             ->save(
        //                 factory(App\InteractionObject::class)->make()
        //             )->interaction_definition()
        //             ->save(
        //                 factory(App\InteractionDefinition::class)->make()
        //             );
        //         $i->interaction_result()
        //             ->save(
        //                 factory(App\InteractionResult::class)->make()
        //             )->interaction_extensions()
        //             ->saveMany(factory(App\InteractionExtension::class, 3)->make());
        //     });
    }
}
