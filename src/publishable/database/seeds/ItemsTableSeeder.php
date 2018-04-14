<?php

use Illuminate\Database\Seeder;
use Korzechowski\RestApi\Data\Item;

class ItemsTableSeeder extends Seeder
{
    private $products = [
        "Produkt 1" => 4,
        "Produkt 2" => 12,
        "Produkt 5" => 0,
        "Produkt 7" => 6,
        "Produkt 8" => 2
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->products as $name => $amount) {
            Item::create([
                "name" => $name,
                "amount" => $amount
            ]);
        }
    }
}
