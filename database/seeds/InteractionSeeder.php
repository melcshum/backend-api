<?php

use Illuminate\Database\Seeder;
use App\Interaction;
use App\InteractionAction;

class InteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $i = new Interaction;
        // $i->name = "Test Name";
        // $i->save();


        // $a = new InteractionAction;
        // $a->verb = "Test Name";
        // $i->interaction_action()->save($a);

        // $this->call(UsersTableSeeder::class);

        factory(App\Interaction::class, 1)->create()
            ->each(function ($i) {
                $i->interaction_actor()
                    ->save(
                        factory(App\InteractionActor::class)->make()
                    );
                $i->interaction_action()
                    ->save(
                        factory(App\InteractionAction::class)->make()
                    );

                $i->interaction_object()
                    ->save(
                        factory(App\InteractionObject::class)->make()
                    )->interaction_defintion()
                    ->save(
                        factory(App\InteractionDefintion::class)->make()
                    );
                $i->interaction_result()
                    ->save(
                        factory(App\InteractionResult::class)->make()
                    )->interaction_extensions()
                    ->saveMany(factory(App\InteractionExtension::class, 3)->make());
            });
    }
}
