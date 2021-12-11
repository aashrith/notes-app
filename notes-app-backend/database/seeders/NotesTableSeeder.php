<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->delete();
        $json = File::get("database/seed-data/notes.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table('notes')->insert([
                'id' => $obj->id,
                'title' => $obj->title,
                'description' => $obj->description,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
