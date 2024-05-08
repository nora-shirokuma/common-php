<?php

namespace NoraShirokuma\CommonPhp\Domain\File;

use Exception;
use NoraShirokuma\CommonPhp\Domain\File\FileName\FileName;

class File
{
    private FilePath $path;

    private FileName $name;

    private MimeType $mimeType;

    private Extension $extension;

    public function __construct(FilePath $path)
    {
        $this->path = $path;

        if (!file_exists($path)) {
            throw new Exception('File does not exist.');
        }

        if (!is_file($path)) {
            throw new Exception('This file is not a file.');
        }

        $this->name = new FileName(basename($path));

        (function(FilePath $path) {

            $info = finfo_open(FILEINFO_MIME_TYPE);

            if ($info === false) {
                throw new Exception('Failed to obtain file information.');
            }

            $mime = finfo_file($info, $path);

            if ($mime === false) {
                throw new Exception('Failed to obtain mime type.');
            }

            $this->mimeType = new MimeType($mime);

        })($path);

        (function(FilePath $path) {

            $info = pathinfo($path);

            if (is_null($info['extension'] ?? null)) {
                throw new Exception('Failed to obtain extension.');
            }

            if ($info['extension'] === '') {
                throw new Exception('Failed to obtain extension.');
            }

            $this->extension = new Extension($info['extension']);

        })($path);
    }

    public function getPath(): FilePath
    {
        return $this->path;
    }

    public function getName(): FileName
    {
        return $this->name;
    }

    public function getMimeType(): MimeType
    {
        return $this->mimeType;
    }

    public function getExtension(): Extension
    {
        return $this->extension;
    }
}