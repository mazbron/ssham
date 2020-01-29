<?php
/**
 * SSH Access Manager - SSH keys management solution.
 *
 * Copyright (c) 2017 - 2020 by Paco Orozco <paco@pacoorozco.info>
 *
 *  This file is part of some open source application.
 *
 *  Licensed under GNU General Public License 3.0.
 *  Some rights reserved. See LICENSE, AUTHORS.
 *
 * @author      Paco Orozco <paco@pacoorozco.info>
 * @copyright   2017 - 2020 Paco Orozco
 * @license     GPL-3.0 <http://spdx.org/licenses/GPL-3.0>
 * @link        https://github.com/pacoorozco/ssham
 */

namespace App\Libs\RsaSshKey;

use App\FileEntry;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use phpseclib\Crypt\RSA;

class RsaSshKey
{
    /**
     * Private Key Format
     */
    const PRIVATE_KEY_FORMAT = RSA::PRIVATE_FORMAT_PKCS1;

    /**
     * Private Key Bits Length
     */
    const PRIVATE_KEY_LENGTH = 1024;

    /**
     * Public Key Format
     */
    const PUBLIC_KEY_FORMAT = RSA::PUBLIC_FORMAT_OPENSSH;

    /**
     * Create public / private key pair to be used in SSH.
     *
     * Returns an array with the following elements:
     *  - 'privatekey': The private key.
     *  - 'publickey':  The public key.
     *
     * @return array - array of two elements 'privatekey' and 'publickey'.
     */
    public static function create(): array
    {
        $rsa = new RSA();
        $rsa->setPrivateKeyFormat(self::PRIVATE_KEY_FORMAT);
        $rsa->setPublicKeyFormat(self::PUBLIC_KEY_FORMAT);
        $keys = $rsa->createKey(self::PRIVATE_KEY_LENGTH);
        return Arr::only($rsa->createKey(self::PRIVATE_KEY_LENGTH), ['privatekey', 'publickey']);
    }

    /**
     * Return the public key
     *
     * @param string $key
     *
     * @return string
     * @throws \App\Libs\RsaSshKey\InvalidInputException
     */
    public static function getPublicKey(string $key): string
    {
        $rsa = new RSA();
        if (!$rsa->loadKey($key, self::PUBLIC_KEY_FORMAT)) {
            throw new InvalidInputException('The provided key is malformed.');
        }

        $key = $rsa->getPublicKey(self::PUBLIC_KEY_FORMAT);
        if ($key === false) {
            throw new InvalidInputException('The public key has not been found.');
        }

        return $key;
    }

    /**
     * Return the private key
     *
     * @param string $key
     *
     * @return string
     * @throws \App\Libs\RsaSshKey\InvalidInputException
     */
    public static function getPrivateKey(string $key): string
    {

        $rsa = new RSA();
        if (!$rsa->loadKey($key, self::PRIVATE_KEY_FORMAT)) {
            throw new InvalidInputException('The provided key is malformed.');
        }

        $key = $rsa->getPrivateKey(self::PRIVATE_KEY_FORMAT);
        if ($key === false) {
            throw new InvalidInputException('The private key has not been found.');
        }

        return $key;
    }

    /**
     * Get the fingerprint of a RSA public key.
     *
     * @param string $key           - RSA publec key content.
     * @param string $hashAlgorithm - Valid values are 'md5' or 'sha256'.
     *
     * @return string - The calculated fingerprint.
     *
     * @throws \App\Libs\RsaSshKey\InvalidInputException
     */
    public static function getPublicFingerprint(string $key, string $hashAlgorithm = 'md5'): string
    {
        $rsa = new RSA();
        if (!$rsa->loadKey($key, self::PUBLIC_KEY_FORMAT)) {
            throw new InvalidInputException('The provided key is malformed.');
        }

        return $rsa->getPublicKeyFingerprint($hashAlgorithm);
    }

    /**
     * Create a downloadable file containing the specified key as content. A random name will be generated to
     * avoid malicious users to find the name of the file.
     *
     * @param string $content           - The key that will be the file content.
     * @param string $original_filename - The filename that the user will see once the file is downloaded.
     *
     * @return string - The random name of the created file.
     */
    public static function createDownloadableFile(string $content, string $original_filename = null): string
    {
        // create a random name for RSA private key file
        $filename = Str::random(32);
        Storage::disk('local')->put($filename, $content);

        // create a downloadable file, with a random name
        $fileEntry = new FileEntry();
        $fileEntry->filename = $filename;
        $fileEntry->mime = 'application/octet-stream';
        $fileEntry->original_filename = $original_filename ?: $filename;
        $fileEntry->save();

        return $filename;
    }
}
