<?php

namespace App\Http\Controllers;

use App\Host;
use App\Hostgroup;
use App\Http\Requests\SearchRequest;
use App\Rule;
use App\User;
use App\Usergroup;
use Spatie\Searchable\Search;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user_count = User::all()->count();
        $host_count = Host::all()->count();
        $rule_count = Rule::all()->count();

        return view('home', compact('user_count', 'host_count', 'rule_count'));
    }

    public function search(SearchRequest $request)
    {
        $query = $request->input('query');

        $searchResults = (new Search())
            ->registerModel(User::class, 'username', 'email', 'fingerprint')
            ->registerModel(Usergroup::class, 'name', 'description')
            ->registerModel(Host::class, 'hostname')
            ->registerModel(Hostgroup::class, 'name', 'description')
            ->perform($request->input('query'));

        $count = $searchResults->count();

        return view('search', compact('count', 'query', 'searchResults'));
    }

}
