<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cure;
use Illuminate\Http\Request;

class CureController extends Controller
{
    public function index()
    {
        $cures = Cure::latest()->get();
        return view('admin.cures.index', compact('cures'));
    }

    public function create()
    {
        return view('admin.cures.create');
    }

    public function edit($id)
    {
        $cure = Cure::findOrFail($id);
        return view('admin.cures.edit', compact('cure'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $cure = Cure::findOrFail($id);

        $cure->update([
            'type' => $request->type,
            'description' => $request->description,
            'percentage' => $request->percentage,
        ]);

        return redirect()
            ->route('admin.cures.index')
            ->with('success', 'Cure updated successfully');
    }
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'description' => 'required',
            'percentage' => 'required|numeric'
        ]);

        Cure::create($request->all());
        return redirect()->route('admin.cures.index');
    }

    public function destroy(Cure $cure)
    {
        $cure->delete();
        return back();
    }
}
