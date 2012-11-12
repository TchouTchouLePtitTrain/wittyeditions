<?php

namespace Witty\ToolsBundle\Model;

use Gaufrette\Filesystem as BaseFileSystem;
use Symfony\Component\HttpFoundation\File\File as File;

class FileSystem extends BaseFileSystem
{

    /**
     * Moves a file to a location of the fileSystem
     *
     * @param  File $file, string folder
     *
     * @return boolean
     */
    public function moveFile(File $file, $folder = "", $filename = "")
    {
        return $this->adapter->moveFile($file, $folder, $filename);
    }
}