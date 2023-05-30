<?php

namespace Database\Seeders;

use App\Models\Mailing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Mailing::with('user')->get() as $mailing)
        {
            $delivered = rand(1, 100) > 10;
            if ($delivered)
            {
                $mailing->storeEvent('Delivery');

                $opened = rand(1, 100) > 50;
                if ($opened)
                {
                    $mailing->storeEvent('Open');

                    $clicked = rand(1, 100) > 50;
                    if ($clicked)
                    {
                        $mailing->storeEvent('Click');
                    }
                }

            }
        }
    }
}
