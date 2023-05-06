# Hash Calculator

This library provides a simple and secure way to calculate hash values for data using various algorithms.

## How to use:

### calculateHash

```php
$data = 'my secret data';
$algorithm = 'sha256';

$hash = HashCalculator::calculateHash($data, $algorithm);

echo $hash;
```

### calculateFileHash

To use the `calculateFileHash` method, you need to pass two parameters: the file path and the algorithm to be used.

For example, let's assume the file path is `/path/to/file` and the algorithm to be used is `sha256`. In the sample code below, you can calculate the hash value for this file using the `calculateFileHash` method:

```php
$file = '/path/to/file';
$algorithm = 'sha256';

try {
    $hash = HashCalculator::calculateFileHash($file, $algorithm);
    echo $hash;
} catch (\InvalidArgumentException $e) {
    echo 'Error: ' . $e->getMessage();
}
```

In this example, we call the `calculateFileHash` method using a `try-catch` block. If the `calculateFileHash` method runs successfully, we print the hash value to the screen. However, if the `calculateFileHash` method throws an invalid argument error, we print the error message to the screen.

Note that the `calculateFileHash` method uses the `fopen()` and `fread()` functions to read the file. Therefore, memory usage problems may occur if the file is large. To prevent this issue, in the sample code, we set a memory space of 8 KB for the `fread()` function (`fread($handle, 8192)`). You can increase or decrease this value according to your needs.

## Authors

**Ramazan Çetinkaya**
- <https://github.com/ramazancetinkaya>

## License

This project is licensed under the [MIT] License - see the LICENSE.md file for details.

## Copyright

Copyright (c) [2023] [Ramazan Çetinkaya]
