<?php

function load_files_from(string $directory): void
{
    if (is_dir($directory) === false) {
        throw new InvalidArgumentException("Diretório não encontrado: {$directory}");
    }

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $file) {
        if ($file->isFile() === false || $file->getExtension() !== 'php') {
            continue;
        }

        require_once $file->getPathname();
    }
}

load_files_from(__DIR__ . '/utils');
load_files_from(__DIR__ . '/hooks');
