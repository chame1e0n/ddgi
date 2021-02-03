<?php

use Illuminate\Database\Seeder;
use App\Models\Spravochniki\Bank;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bank::class, 2000)->create([
        	'status' => 0
        ]);
    }
}
