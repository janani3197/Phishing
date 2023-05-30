<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(User::all() as $user)
        {
            $num = rand(1, 10);
            while($num--)
            {
                $user->mailings()->create([
                    'message' => fake()->text()
                ]);
            }
        }
    }
}
