<?php
/**
 * Hash Calculator Library
 *
 * This library provides a simple and secure way to calculate hash values
 * for data using various algorithms.
 *
 * @category  Library
 * @package   HashCalculator
 * @author    Ramazan Çetinkaya
 * @license   MIT License
 * @version   1.0
 * @link      https://github.com/ramazancetinkaya/hash-calculator
 */

namespace HashCalculator;

/**
 * HashCalculator class
 *
 * This class provides methods for generating hash values using various algorithms.
 *
 * @category  Library
 * @package   HashCalculator
 */
class HashCalculator
{
    /**
     * Generates a hash value for the specified data using the specified algorithm.
     *
     * @param string $data      The data to calculate the hash value for.
     * @param string $algorithm The algorithm to use for the hash calculation.
     *
     * @return string The calculated hash value.
     *
     * @throws \InvalidArgumentException If the specified algorithm is not supported.
     */
    public static function calculateHash(string $data, string $algorithm): string
    {
        if (!in_array($algorithm, hash_algos())) {
            throw new \InvalidArgumentException(sprintf('Unsupported algorithm "%s".', $algorithm));
        }

        return hash($algorithm, $data);
    }

    /**
     * Generates a hash value for the specified file using the specified algorithm.
     *
     * @param string $file      The path to the file to calculate the hash value for.
     * @param string $algorithm The algorithm to use for the hash calculation.
     *
     * @return string The calculated hash value.
     *
     * @throws \InvalidArgumentException If the specified algorithm is not supported or the file cannot be opened.
     */
    public static function calculateFileHash(string $file, string $algorithm): string
    {
        if (!in_array($algorithm, hash_algos())) {
            throw new \InvalidArgumentException(sprintf('Unsupported algorithm "%s".', $algorithm));
        }

        if (!is_file($file)) {
            throw new \InvalidArgumentException(sprintf('File "%s" does not exist.', $file));
        }

        if (!is_readable($file)) {
            throw new \InvalidArgumentException(sprintf('File "%s" is not readable.', $file));
        }

        $handle = fopen($file, 'rb');

        if (!$handle) {
            throw new \InvalidArgumentException(sprintf('Failed to open file "%s".', $file));
        }

        $hashContext = hash_init($algorithm);

        while (!feof($handle)) {
            hash_update($hashContext, fread($handle, 8192));
        }

        fclose($handle);

        return hash_final($hashContext);
    }
}
