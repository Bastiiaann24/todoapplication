<?php

use Illuminate\Database\Seeder;
use App\Models\Items;

class ItemsTableSeeder extends Seeder
{
    public function run()
    {
        $newItems = [
            [
                'title' => 'Item toevoegen',
                'description' => 'Niet aanwezig',
                'completed' => false,
                'order' => 0
            ],
            [
                'title' => 'Item verwijderen',
                'description' => 'Niet aanwezig',
                'completed' => false,
                'order' => 1
            ],
            [
                'title' => 'Item afvinken',
                'description' => 'Niet aanwezig',
                'completed' => false,
                'order' => 2
            ],
            [
                'title' => 'Item verslepen',
                'description' => 'Niet aanwezig',
                'completed' => false,
                'order' => 3
            ],
            [
                'title' => 'Wijzigingen opslaan',
                'description' => 'Niet aanwezig',
                'completed' => false,
                'order' => 4
            ],
        ];

        foreach ($newItems as $newItem) {
            $item = new Items();
            $item->fill($newItem);
            $item->save();
        }
    }
}