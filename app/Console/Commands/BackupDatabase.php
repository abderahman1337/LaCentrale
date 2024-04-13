<?php

namespace App\Console\Commands;

use App\Helpers\Settings;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class BackupDatabase extends Command
{
    protected $signature = 'backup:database';
    protected $description = 'Create a daily backup of the database';

    public function handle()
    {
        $storeName = Settings::website_name();
        $host = config('database.connections.mysql.host');
        $port = config('database.connections.mysql.port');
        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $backupDir = storage_path('app/backups');
        if (!file_exists($backupDir)) {
            mkdir($backupDir, 0755, true);
        }
        $backupFileName = Str::slug($storeName).'_backup_'. rand(1000,9999). '_' . date('Y-m-d_H-i-s') . '.sql';
        $filePath = $backupDir . '/' . $backupFileName;
        $command = "mysqldump --host={$host} --port={$port} --user={$username} --password={$password} --no-tablespaces {$database} > {$backupDir}/{$backupFileName}";
        exec($command);
        $this->info('Database backup created successfully.');
        $remoteHost = config('backup.host');
        $remoteUsername = config('backup.username');
        $remotePath = config('backup.save_path');
        $scpCommand = "scp -i ./.ssh/id_rsa {$filePath} {$remoteUsername}@{$remoteHost}:{$remotePath}";
        $result = exec($scpCommand);
        $this->info('Database backup sent to another server successfully.');
        if($result){
            if (Storage::disk('local')->exists('backups/'.$backupFileName)) {
                Storage::disk('local')->delete('backups/'.$backupFileName);
                $this->info('Database backup file deleted from storage successfully.');
            } 
        }
    }
}
