<?php

namespace App\Commands;

use App\HubSpot;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class BlogPostExport extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'blog:posts';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Access blog post content.';

    protected $hubspot;

  /**
   * Create a new command instance.
   *
   * @param \App\HubSpot $hubspot
   */
    public function __construct(HubSpot $hubspot)
    {
      $this->hubspot = $hubspot->hubspot;
      parent::__construct();
    }

  /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      return $this->hubspot->blogPosts()->all();
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
