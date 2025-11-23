<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Wallet;

class WalletSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $u) {
            Wallet::updateOrCreate(
                ['user_id' => $u->id],
                [
                    'balance' => 200000,
                    'bank_name' => 'BCA'
                ]
            );
        }
    }
}
