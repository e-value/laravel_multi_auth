<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Admin;
use App\Models\Company;

use Carbon\Carbon;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->delete();

        Company::create([
            'name' => '宮田 吉朗',
            'email' => 'y.miyata@env-value.co.jp',
            'password' => bcrypt('env-value01'),
            'created_at' => Carbon::now()
        ]);

        Company::create([
            'name' => '奥村 夏希',
            'email' => 'm.okumura@env-value.co.jp',
            'password' => bcrypt('env-value01'),
            'created_at' => Carbon::now()
        ]);
    }
}
