<?php

echo "Current working directory: " . getcwd() . "\n";

define('BACKUP_RETENTION_COUNT', 60); // Number of backup copies to retain

function backupFolder($sourceDirectory, $destinationDirectory)
{
    // Open the source directory
    $dir = opendir($sourceDirectory);

    // Make the destination directory if not exist
    @mkdir($destinationDirectory);

    // Loop through the files in source directory
    while ($file = readdir($dir)) {
        if ($file != '.' && $file != '..') {
            if (is_dir($sourceDirectory . '/' . $file)) {
                // Recursively backup subdirectories
                backupFolder($sourceDirectory . '/' . $file, $destinationDirectory . '/' . $file);
            } else {
                // Copy files
                copy($sourceDirectory . '/' . $file, $destinationDirectory . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function deleteOldBackups($backupDirectory)
{
    // Delete old backups
    $backups = glob($backupDirectory . '/backup_*');
    if (count($backups) > BACKUP_RETENTION_COUNT) {
        asort($backups); // Sort backups by date
        $backupsToDelete = array_slice($backups, 0, count($backups) - BACKUP_RETENTION_COUNT);
        foreach ($backupsToDelete as $backup) {
            array_map('unlink', glob($backup . '/*'));
            rmdir($backup);
        }
    }
}

// Usage
$sourceFolder = '/path/to/source/folder';
$backupFolder = '/path/to/backup/folder_' . date('Y-m-d_H-i-s');

// backupFolder($sourceFolder, $backupFolder);
// deleteOldBackups($sourceFolder);

echo "Backup of '$sourceFolder' completed to '$backupFolder' \n\n";

