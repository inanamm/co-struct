<?php

echo "Current working directory: " . getcwd() . "\n";

define('BACKUP_RETENTION_COUNT', 3); // Number of backup copies to retain

function backupFolder($sourceDirectory, $destinationDirectory)
{
    // Open the source directory
    $dir = opendir($sourceDirectory);

    // Make the destination directory if not exist
    if (!file_exists($destinationDirectory)) {
        mkdir($destinationDirectory, 0777, true);
    }

    // Loop through the files in source directory
    while ($file = readdir($dir)) {
        if ($file != '.' && $file != '..') {
            $sourcePath = $sourceDirectory . '/' . $file;
            $destinationPath = $destinationDirectory . '/' . $file;

            if (is_dir($sourcePath)) {
                // Recursively backup subdirectories
                backupFolder($sourcePath, $destinationPath);
            } else {
                // Copy files
                copy($sourcePath, $destinationPath);
            }
        }
    }
    closedir($dir);
}

function deleteDirectory($dir)
{
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }
    }

    return rmdir($dir);
}

function deleteOldBackups($backupDirectory)
{
    echo "Looking for backups in: $backupDirectory\n";

    $backups = glob($backupDirectory . '/co_struct_backup_*');
    echo "Found backups:\n";
    print_r($backups);

    if (count($backups) > BACKUP_RETENTION_COUNT) {
        asort($backups); // Sort backups by date
        $backupsToDelete = array_slice($backups, 0, count($backups) - BACKUP_RETENTION_COUNT);
        foreach ($backupsToDelete as $backup) {
            echo "Deleting backup: $backup\n";
            deleteDirectory($backup);
        }
    }
}


// Absolute path to the root directory for all backups
$backupRoot = '../../customBackups';

// Source folder to backup
$sourceFolder = './content';

// Backup folder name
$backupFolderName = 'co_struct_backup_' . date('Y-m-d_H:i:s');
$backupFolder = $backupRoot . '/' . $backupFolderName . '/' . basename($sourceFolder);

backupFolder($sourceFolder, $backupFolder);
deleteOldBackups($backupRoot);

echo "Backup of '$sourceFolder' completed to '$backupFolder' \n\n";
