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

namespace Tests\Unit\Http\Controllers;

use App\Hostgroup;
use App\Keygroup;
use App\ControlRule;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ControlRuleControllerTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    private $user_to_act_as;

    public function setUp(): void
    {
        parent::setUp();
        $this->user_to_act_as = factory(User::class)->create();
    }

    public function test_index_method_returns_proper_view()
    {
        $response = $this
            ->actingAs($this->user_to_act_as)
            ->get(route('rules.index'));

        $response->assertSuccessful();
        $response->assertViewIs('rule.index');
    }

    public function test_create_method_returns_proper_view()
    {
        $response = $this
            ->actingAs($this->user_to_act_as)
            ->get(route('rules.create'));

        $response->assertSuccessful();
        $response->assertViewIs('rule.create');
    }

    public function test_create_method_returns_proper_data()
    {
        $sources = factory(Keygroup::class, 3)->create();
        $targets = factory(Hostgroup::class, 3)->create();

        $response = $this
            ->actingAs($this->user_to_act_as)
            ->get(route('rules.create'));

        $response->assertSuccessful();
        $response->assertViewHas('sources', $sources->pluck('name', 'id'));
        $response->assertViewHas('targets', $targets->pluck('name', 'id'));
    }

    public function test_destroy_method_returns_proper_success_message()
    {
        $rule = factory(ControlRule::class)->create();

        $response = $this
            ->actingAs($this->user_to_act_as)
            ->delete(route('rules.destroy', $rule->id));

        $response->assertSessionHas('success');
    }

    public function test_data_method_returns_error_when_not_ajax()
    {
        $response = $this
            ->actingAs($this->user_to_act_as)
            ->get(route('rules.data'));

        $response->assertForbidden();
    }

    public function test_data_method_returns_data()
    {
        $rules = factory(ControlRule::class, 3)->create();

        $response = $this
            ->actingAs($this->user_to_act_as)
            ->ajaxGet(route('rules.data'));

        $response->assertSuccessful();
        foreach ($rules as $rule) {
            $response->assertJsonFragment([
                'source' => $rule->source,
                'target' => $rule->target,
                'name' => $rule->name,
            ]);
        }
    }
}
