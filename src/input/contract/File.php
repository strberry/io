<?php

class File
{
    private string $fullPath;

    public function __construct(string $fullPath)
    {
        $this->fullPath = $fullPath;
    }

    /**
     * @return string
     */
    public function getFullPath(): string
    {
        return $this->fullPath;
    }
}