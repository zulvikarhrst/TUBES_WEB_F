<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::all();
        return view('journals.index', compact('journals'));
    }

    public function create()
    {
        return view('journals.create');
    }

    public function store(Request $request)
    {
        Journal::create($request->all());
        return redirect()->route('journals.index');
    }

    public function edit(Journal $journal)
    {
        return view('journals.edit', compact('journal'));
    }

    public function update(Request $request, Journal $journal)
    {
        $journal->update($request->all());
        return redirect()->route('journals.index');
    }

    public function destroy(Journal $journal)
    {
        $journal->delete();
        return redirect()->route('journals.index');
    }
}
