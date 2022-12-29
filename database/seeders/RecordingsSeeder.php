<?php

namespace Database\Seeders;

use App\Models\Recordings;
use Illuminate\Database\Seeder;

class RecordingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = array_map('str_getcsv', file('database/seeders/recordings.csv'));
        $header = array_shift($csv);
        $csv = array_map(function ($row) use ($header) {
            return array_combine($header, $row);
        }, $csv);

        foreach ($csv as $row) {
            $recordings = new Recordings;
            $recordings->entry_id = $row['entry_id'];
            $recordings->temperature = $row['Temperature (C)'];
            $recordings->turbidity = $row['Turbidity (NTU)'];
            $recordings->dissolved_oxygen = $row['Dissolved Oxygen(g/ml)'];
            $recordings->ph = $row['PH'];
            $recordings->ammonia = $row['Ammonia(g/ml)'];
            $recordings->nitrate = $row['Nitrate(g/ml)'];
            $recordings->population = $row['Population'];
            $recordings->fish_length = $row['Fish_Length (cm)'];
            $recordings->fish_weight = $row['Fish_Weight (g)'];
            $recordings->created_at = $row['created_at'];
            $recordings->save();
        }
    }
}
