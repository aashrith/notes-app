<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class TagsmapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tagsmap')->delete();
        $json = File::get("database/seed-data/tagsmap.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table('tagsmap')->insert([
                'id' => $obj->id,
                'note_id' => $obj->note_id,
                'tag_id' => $obj->tag_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
