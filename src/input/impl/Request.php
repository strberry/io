<?php

class Request implements IRequest
{
    private array $data;
    private string $requestType;

    /**
     * @throws Exception
     */
    function __construct()
    {
        $this->requestType = $this->fetchRequestType();
        $this->data = $this->fetchData();
    }

    private function fetchRequestType(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @throws Exception
     */
    public function fetchData(): array
    {
        return match ($this->requestType) {
            "GET" => $_GET,
            "POST" => $_POST,
            default => throw new Exception("Unsupported request type!"),
        };
    }

    function fetchOrNull(string $paramName, $filter = null)
    {
        try {
            return $this->fetch($paramName, $filter);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @throws Exception
     */
    function fetch(string $paramName, $filter = null)
    {
        if (!array_key_exists($paramName, $this->data))
            throw new Exception("Requested parameter has not been set.");

        $value = $this->data[$paramName];

        if ($filter === null)
            return $value;

        return (new ArgumentFilter())->{$filter}($value);
    }

    /**
     * @throws Exception
     */
    function fetchFile(string $paramName): File
    {
        if (!array_key_exists($paramName, $_FILES))
            throw new Exception("Requested file has not been set.");

        $fileData = $_FILES[$paramName];
        return new File($fileData["name"], $fileData["type"], $fileData["tmp_name"], $paramName);
    }

    function fetchFileOrNull(string $paramName): ?File
    {
        try {
            return $this->fetchFile($paramName);
        } catch (Exception $e) {
            return null;
        }
    }

    function moveFile(File $file, string $newLocation): void
    {
        copy($file->getTempPath(), $newLocation);
    }

}