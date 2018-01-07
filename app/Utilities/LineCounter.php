<?php

namespace xatbot\Utilities;

class LineCounter
{
    private $filepath;
    private $files = [];

    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    public function countLines($extensions = array('php'))
    {
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->filepath));
        foreach ($it as $file) {
            if ($file->isDir()) {
                continue;
            }

            $parts = explode('.', $file->getFilename());
            $extension = end($parts);

            if (in_array($extension, $extensions)) {
                $files[$file->getPathname()] = count(file($file->getPathname()));
            }
        }
        return $files;
    }

    public function getLines()
    {
        return $this->countLines();
    }

    public function totalLines()
    {
        return array_sum($this->countLines());
    }
}
