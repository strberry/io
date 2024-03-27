<?php

interface IRequest
{
    function fetch(string $paramName, $filter = null);

    function fetchOrNull(string $paramName, $filter = null);

    function fetchFile(string $paramName): File;

    function fetchFileOrNull(string $paramName): ?File;

    function moveFile(File $file, string $newLocation): void;
}