<?php

use Illuminate\Database\Seeder;
use App\World;
use App\Resource;
use App\World_area;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(WorldTableSeeder::class);
         $this->call(ResourceTableSeeder::class);
         $this->call(WorldAreasTableSeeder::class);
    }
}

class WorldTableSeeder extends Seeder {

    public function run()
    {
        DB::table('worlds')->delete();

        World::create(['name' => 'World 1']);
    }

}

class ResourceTableSeeder extends Seeder {
    public function run()
    {
        DB::table('resources')->delete();

        Resource::create(['res_id' => 1, 'resource_name' => 'wood']);
        Resource::create(['res_id' => 2, 'resource_name' => 'stone']);
        Resource::create(['res_id' => 3, 'resource_name' => 'iron']);
        Resource::create(['res_id' => 4, 'resource_name' => 'copper']);
        Resource::create(['res_id' => 5, 'resource_name' => 'coal']);
    }
}


class WorldAreasTableSeeder extends Seeder {
    public function run(){
        DB::table('world_areas')->delete();
        World_area::create(['resource1' => 1, 'generate_resource1' => 11, 'resource2' => 3, 'generate_resource2' => 7, 'world_id' => 1]);
        World_area::create(['resource1' => 1, 'generate_resource1' => 25, 'world_id' => 1]);
        World_area::create(['resource1' => 3, 'generate_resource1' => 8, 'resource2' => 5, 'generate_resource2' => 17, 'world_id' => 1]);
        World_area::create(['resource1' => 4, 'generate_resource1' => 21, 'world_id' => 1]);
        World_area::create(['resource1' => 1, 'generate_resource1' => 11, 'resource2' => 3, 'generate_resource2' => 7,'resource3' => 4, 'generate_resource3' => 7, 'world_id' => 1]);
    }
}
