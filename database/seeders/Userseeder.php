<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadminrole=Role::where('Role_name','Super Admin')->first();
        $normaladminrole=Role::where('Role_name','Normal Admin')->first();

        $superAdmin=User::create([
            // 'username'=>'Super-Admin 1',
            'name'=>'Super Admin',
            'is_admin'=>1,
            'email'=>'super@admin.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('password'),
            'remember_token'=>Str::random(10)
        ]);

        $normalAdmin=User::create([
            // 'username'=>'Normal-Admin 1',
            'name'=>'Normal Admin',
            'is_admin'=>1,
            'email'=>'normal@admin.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('password'),
            'remember_token'=>Str::random(10)
        ]);

        $superAdmin->roles()->attach($superadminrole);
        $normalAdmin->roles()->attach($normaladminrole);
    }
}
