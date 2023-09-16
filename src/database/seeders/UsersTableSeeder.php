<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'              => 'Fady',
            'email'             => 'fady@medical.com',
            'email_verified_at' => now(),
            'password'          => 'password',
            'remember_token'    => Str::random(10),
        ]);
    }
}
