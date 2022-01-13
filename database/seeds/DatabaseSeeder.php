<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call(PermissionTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(CreateCouncilTableSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(StandardSeeder::class);
        $this->call(BookTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
    }
}
