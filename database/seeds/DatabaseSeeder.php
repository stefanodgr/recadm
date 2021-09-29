<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function roles(){
        return $this->belongsToMany('App\Permission\Models\Role')->withTimesTamps();
    }    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    }
}
