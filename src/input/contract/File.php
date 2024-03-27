<?php

class File
{
    private string $originalName;
    private string $type;
    private string $tempPath;
    private string $postParameterName;

    public function __construct(string $originalName, string $type, string $tempPath, string $postParameterName)
    {
        $this->originalName = $originalName;
        $this->type = $type;
        $this->tempPath = $tempPath;
        $this->postParameterName = $postParameterName;
    }

    /**
     * @return string
     */
    public function getOriginalName(): string
    {
        return $this->originalName;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTempPath(): string
    {
        return $this->tempPath;
    }

    /**
     * @return string
     */
    public function getPostParameterName(): string
    {
        return $this->postParameterName;
    }
}