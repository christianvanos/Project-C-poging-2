<?php

use Illuminate\Database\Seeder;

class UserstoryItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backlog_ids = App\Backlogs::pluck('id');

        foreach ($backlog_ids as $backlog_id) {
            $project_id = App\Backlogs::find($backlog_id)->sprint->project->id;
            $userstory_ids = App\Userstories::where('project_id', $project_id)->pluck('id');
            $backlog = App\Backlogs::find($backlog_id);

            foreach ($userstory_ids as $userstory_id) {
                $item_id = DB::table('userstory_items')->insertGetId([
                    'description' => '(dummy text)',
                    'moscow' => 'Must Have',
                    'definition_of_done' => 'Defenition of done (dummy text)',
                    'story_points' => 4,
                    'backlog_id' => App\Backlogs::find($backlog_id)->id,
                    'userstory_id' => App\Userstories::find($userstory_id)->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('item_history')->insert([
                    'label' => $backlog->label,
                    'item_id' => $item_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
