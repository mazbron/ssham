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

return [

    'username_help' => 'For security reasons, username <strong>cannot</strong> be changed once the key is created.',

    'private_key_available' => 'Private key is available',
    'download_private_key' => 'Download private key',
    'download_private_key_help' => 'You are going to download the RSA private key of this user. Bear in mind that this action <b>can only be done once</b>, keep safe the file containing the private key.',

    'groups_help' => 'Please select the groups where this key belongs to',
    'create_public_key' => 'Create a new RSA private / public key',
    'create_public_key_help' => 'A new RSA key pair will be generated. The private key <strong>must be downloaded and delivered securely</strong> to the user.',
    'change_public_key_help_notice' => 'The current public key will be revoked. Please act with caution',
    'maintain_public_key' => 'Maintain current RSA public key',
    'import_public_key' => 'Import RSA public key',
    'import_public_key_help' => 'Do not paste the private part of the SSH key. Paste only the public part, which is usually beginning with `ssh-rsa`.',

    'create' => [
        'error' => 'Key was not created, please try again.',
        'success' => 'The key \':username\' was created successfully.',
    ],
    'edit' => [
        'error' => 'There was an issue editing the key. Please try again.',
        'success' => 'The key \':username\' was edited successfully.',
    ],
    'delete' => [
        'error' => 'There was an issue deleting the key. Please try again.',
        'success' => 'The key \':username\' was deleted successfully.'
    ],

];
