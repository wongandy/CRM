<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTermsRequest;

class TermsController extends Controller
{
    public function index()
    {
        return view('terms');
    }

    public function store(StoreTermsRequest $request)
    {
        auth()->user()->update([
            'terms_accepted' => true,
        ]);

        return redirect()->route('dashboard');
    }
}
