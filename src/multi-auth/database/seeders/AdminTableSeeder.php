<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Admin;

use Carbon\Carbon;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        Admin::create([
            'name' => '宮田 吉朗',
            'email' => 'y.miyata@env-value.co.jp',
            'password' => bcrypt('env-value01'),
            'created_at' => Carbon::now()
        ]);

        Admin::create([
            'name' => '奥村 夏希',
            'email' => 'm.okumura@env-value.co.jp',
            'password' => bcrypt('env-value01'),
            'created_at' => Carbon::now()
        ]);
    }
}
