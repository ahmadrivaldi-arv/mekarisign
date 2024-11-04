<?php

namespace Ahmdrv\MekariSign\Commands;

use Illuminate\Console\Command;

class MekariSignCommand extends Command
{
    public $signature = 'mekarisign';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
