<?php
/**
 * SSH Access Manager - SSH keys management solution.
 *
 * Copyright (c) 2017 - 2019 by Paco Orozco <paco@pacoorozco.info>
 *
 *  This file is part of some open source application.
 *
 *  Licensed under GNU General Public License 3.0.
 *  Some rights reserved. See LICENSE, AUTHORS.
 *
 * @author      Paco Orozco <paco@pacoorozco.info>
 * @copyright   2017 - 2019 Paco Orozco
 * @license     GPL-3.0 <http://spdx.org/licenses/GPL-3.0>
 * @link        https://github.com/pacoorozco/ssham
 */

use App\Keygroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeygroupsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keygroups')->delete();

        $keygroups = array(
            array(
                'name' => 'developers',
                'description' => 'Group of awesome developers'
            ),
            array(
                'name' => 'operators',
                'description' => 'Group of incredible operators'
            )
        );

        foreach ($keygroups as $group) {
            Keygroup::create($group);
        }
    }

}
