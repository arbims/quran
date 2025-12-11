<?php
declare(strict_types=1);

namespace Swagger\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

/**
 * AssetsSwagger command.
 */
class AssetsSwaggerCommand extends Command
{
    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        return $parser;
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $sourceDir = ROOT . DS . 'plugins/Swagger/assets';
        $jsDest = ROOT . DS . 'webroot' . DS . 'js';
        $cssDest = ROOT . DS . 'webroot' . DS . 'css';

        // Ensure the source directory exists
        if (!is_dir($sourceDir)) {
            $io->error("Source directory ($sourceDir) does not exist.");
            return;
        }

        // Ensure the destination directory exists, if not, create it
        if (!is_dir($jsDest)) {
            mkdir($jsDest, 0755, true);
            $io->info("Created destination directory ($jsDest).");
        }
        // Copy all files from source to destination
        $this->copyFiles($sourceDir, $jsDest, 'js', $io);

        if (!is_dir($cssDest)) {
            mkdir($cssDest, 0755, true);
            $io->info("Created destination directory ($cssDest).");
        }

        // Copy all files from source to destination
        $this->copyFiles($sourceDir, $cssDest, 'css', $io);

        $io->info('files have been successfully copied!');
    }

    private function copyFiles($sourceDir, $destinationDir, $type, $io)
    {
        // Get all JS files in the source directory
        $files = glob($sourceDir . '/*.'.$type);

        foreach ($files as $file) {
            $fileName = basename($file);
            $destination = $destinationDir . '/' . $fileName;

            if (copy($file, $destination)) {
                $io->info("Copied: $fileName");
            } else {
                $io->error("Failed to copy: $fileName");
            }
        }
    }
}
