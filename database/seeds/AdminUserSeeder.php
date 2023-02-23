<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = DB::table('users')->where('type','admin')->first();
        if($check==null){
          
          DB::table('users')->insert([
            'type' => 'admin',
            'name' => 'admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('asdfghjkl;')
          ]);
    
        }
    }
}
