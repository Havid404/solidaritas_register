<?php

use App\FamiliesRelation;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class FamilyRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relations = ['ORANG TUA', 'ANAK KANDUNG','ISTRI','SUAMI','SAUDARA KANDUNG'];
        foreach ($relations as $relation){
            
            $Saverelation = FamiliesRelation::create([
                'relation' => $relation
                
            ]);
        }
    }
}
