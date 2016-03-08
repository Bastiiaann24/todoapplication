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
                'completed' => false,
                'order' => 0
            ],
            [
                'title' => 'Item verwijderen',
                'completed' => false,
                'order' => 1
            ],
            [
                'title' => 'Item afvinken',
                'completed' => false,
                'order' => 2
            ],
            [
                'title' => 'Item verslepen',
                'completed' => false,
                'order' => 3
            ],
            [
                'title' => 'Wijzigingen opslaan',
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