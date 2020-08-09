<?php

use Illuminate\Database\Seeder;
use App\Prefab;

class PrefabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefabs = [
            ['card_prefab_name' => 'BasicCardTrim', 'boss_can_use' => 1],
            ['card_prefab_name' => 'BasicCardLength', 'boss_can_use' => 1],
            ['card_prefab_name' => 'BasicCardUpperCase', 'boss_can_use' => 1],
            ['card_prefab_name' => 'BasicCardLowerCase', 'boss_can_use' => 1],
            ['card_prefab_name' => 'BasicCardIndexOf', 'boss_can_use' => 1],
            ['card_prefab_name' => 'AthenaLight', 'boss_can_use' => 1],
            ['card_prefab_name' => 'HeavenlyDevil', 'boss_can_use' => 1],
            ['card_prefab_name' => 'Magicthief', 'boss_can_use' => 1],
            ['card_prefab_name' => 'ThousandDisappear', 'boss_can_use' => 0],
            ['card_prefab_name' => 'SevenInjuriesBoxing', 'boss_can_use' => 1],
            ['card_prefab_name' => 'GulityBreaker', 'boss_can_use' => 0],
            ['card_prefab_name' => 'BloodyArmour', 'boss_can_use' => 0],
            ['card_prefab_name' => 'LilyGift', 'boss_can_use' => 0],
            ['card_prefab_name' => 'ForCard_Root', 'boss_can_use' => 1],
            ['card_prefab_name' => 'StringAssignmentCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'IntegerAssignmentCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'IntegerAddAssignmentCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'IntegerSubstractAssignmentCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'IntegerMutliplyAssignmentCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'IntegerDivisionAssignmentCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'ForLoopCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'BasicStatmentsNForBodyCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'BasicStatmentsNIfBodyCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'ForLoopWithEqualCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'BasicStatmentsNForBodyWithEqualCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'BasicStatmentsNIfBodyUpdateCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'ForLoopDecrementCard', 'boss_can_use' => 1],
            ['card_prefab_name' => 'ForLoopDecrementWithEqualCard', 'boss_can_use' => 1],
        ];
        foreach ($prefabs as $key => $value) {
            Prefab::create($value);
        }
    }
}
