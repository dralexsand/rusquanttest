<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorageplaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->getData();

        DB::table('storageplaces')->insert($data);
    }

    private function getData()
    {
        return [
            [
                "storageplace" => "mysql"
            ],
            [
                "storageplace" => "sqlite"
            ],
        ];
    }
}
