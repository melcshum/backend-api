<?php

use Illuminate\Database\Seeder;
use App\Interaction;

class InteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $sessions = App\GameSession::with('profile')->get()->all();

        foreach ($sessions as $session) {
            factory(Interaction::class, 100)->create([
                'name' => $session->profile->name,
                'type' => collect(['Accessible', 'Alternative', 'Completable', 'GameObject'])->random(),
                'game_session_id' => $session->id,

            ])->each(function ($i) {

                $i->interaction_actor()
                    ->save(
                        factory('App\InteractionActor')->make(["name" => $i->name])
                    );


                // based on the previous selected object type, update the options
                $verblist = [
                    'Accessible' => ['Accessed', 'Skipped'],
                    'Alternative' => ['Selected', 'Unlocked'],
                    'Completable' => ['Accessed', 'Skipped'],
                    'GameObject' => ['Accessed', 'Skipped'],
                ];
                $verbs = $verblist[$i->type];

                $i->interaction_action()->save(
                    factory('App\InteractionAction')->make(["name" => collect($verbs)->random()])
                );

                $cardName = "http://localhost/scenarios/name/" . App\Scenario::all('name')->random()->name;

                $i->interaction_object()
                    ->save(
                        factory(App\InteractionObject::class)->make([
                            'name' => 'quest',
                            'game_session_id' => $i->game_session_id
                        ])
                    )->interaction_definition()
                    ->save(
                        factory(App\InteractionDefinition::class)->make(
                            [
                                'name' => $cardName,
                                'game_session_id' => $i->game_session_id
                            ]
                        )
                    );

                $i->interaction_result()
                    ->save(
                        factory(App\InteractionResult::class)->make()
                    )->interaction_extensions()
                    ->saveMany(
                        [
                            factory(App\InteractionExtension::class)->make([
                                'name' => 'Select', 'value' => rand(1, 100)
                            ]),

                            factory(App\InteractionExtension::class)->make([
                                'name' => 'Drag', 'value' => rand(1, 100)
                            ]),

                            factory(App\InteractionExtension::class)->make([
                                'name' => 'Click', 'value' => rand(1, 100)
                            ]),
                            factory(App\InteractionExtension::class)->make([
                                'name' => 'TimeTaken', 'value' => rand(1, 10000000)
                            ])
                        ]
                    );
            });
        }


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
