<?php

namespace App\Console\Commands;

use App\Models\SchemaSetting;
use App\Models\University;
use Illuminate\Console\Command;

class SyncSchemaSettings extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'schema:sync';

    /**
     * The console command description.
     */
    protected $description = 'Create missing schema settings for all universities';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $count = 0;

        University::chunk(100, function ($universities) use (&$count) {

            foreach ($universities as $university) {

                foreach (SchemaSetting::pageTypes() as $pageType => $label) {

                    SchemaSetting::firstOrCreate(
                        [
                            'university_id' => $university->id,
                            'page_type' => $pageType,
                        ],
                        [
                            'is_active' => true,
                        ]
                    );
                }

                $count++;
            }
        });

        $this->info("Schema Settings synced successfully.");
        $this->info("Universities Processed: {$count}");

        return self::SUCCESS;
    }
}