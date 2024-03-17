# 🍓 Extension: Input/Output
This is a simple I/O library for [strawberry](https://github.com/elderguardian/strawberry), but you could easily use it in other frameworks.
## Installation
```
mkdir src/foundations && cd src/foundations
git clone https://github.com/strberry/io.git strawberry-io
```
### (optional) DI Container Mappings
| Interface | Class   |
|-----------|---------|
| IRequest  | Request |
### How to use it
#### Input
```php
$number = $request->fetch('num');       // Exception on failure
$number = $request->fetchOrNull('num'); // Null on failure

// Filtering for Integers
$number = $request->fetch('num', 'integer');

// Fetching uploaded files
$file = $request->fetchFile('filename');
rename($file->getTempName(), "uploads/myfile.txt"); // Uploading it
```
#### Output
```php
<?php

// Extend JsonController instead of the regular one
class HelloController extends JsonController
{
    public function world(): string
    {
        // You can add a status code as second argument
        return $this->respond([
            'message'  =>  "You gave us $number"
        ]);
    }
}
```