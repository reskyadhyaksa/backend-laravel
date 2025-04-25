<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class CreateDatabase extends Command
{
    protected $signature = 'db:create {name}';
    protected $description = 'Create a new database';

    public function handle()
    {
        $dbName = $this->argument('name');

        $charset = config("database.connections.mysql.charset", 'utf8mb4');
        $collation = config("database.connections.mysql.collation", 'utf8mb4_unicode_ci');

        try {
            DB::statement("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET $charset COLLATE $collation;");
            $this->info("Database '$dbName' created successfully.");
        } catch (\Exception $e) {
            $this->error("Error creating database: " . $e->getMessage());
        }
    }
}

