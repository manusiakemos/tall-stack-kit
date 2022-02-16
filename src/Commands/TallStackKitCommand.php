<?php

namespace Manusiakemos\TallStackKit\Commands;

use Illuminate\Console\Command;

class TallStackKitCommand extends Command
{
    public $signature = 'tall-stack-kit';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
