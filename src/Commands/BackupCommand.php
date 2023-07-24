<?php

namespace System\Commands;

use System\Backup\Purge;
use System\Backup\Upload;
use System\Backup\History;
use System\Backup\Storage;
use System\Backup\Database;
use Illuminate\Console\Command;

class BackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     */
    protected $signature = 'app:backup';

    /**
     * The console command description.
     *
     */
    protected $description = 'Backup the database and storage directories.';

    /**
     * Execute the console command.
     *
     */
    public function handle() : void
    {
        Purge::execute();

        Database::execute();
        Storage::execute();
        Upload::execute();
        History::execute();

        Purge::execute();

        $this->info('The backup is complete');
    }
}
