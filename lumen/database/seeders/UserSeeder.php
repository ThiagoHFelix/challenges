<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'name'=> "admin",
            'email' => "admin@admin.com.br",
            'remember_token' => Str::random(60)
        ]);

        $user->password = Hash::make('root');    

        $user->save();
    }
}
