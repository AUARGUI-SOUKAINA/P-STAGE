<?php

namespace App\Http\Controllers;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
{
    $groups = Group::all();
    return view('Admin.Groups.liste_groups', compact('groups'));
}

public function show($id)
{
    $group = Group::findOrFail($id);
    $students = $group->students;
    return view('Admin.Groups.show', compact('group','students'));
}

public function create()
{
    return view('Admin.Groups.create_group');
}


public function destroy($id)
{
    $group = Group::findOrFail($id);
    $group->delete();

    return redirect()->route('groups')->with('success', 'Group deleted successfully.');
}

public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            // Add any other validation rules for the group fields
        ]);

        $group = new Group();
        $group->name = $validatedData['name'];
        // Set other fields of the group

        $group->save();

        return redirect()->route('groups')->with('success', 'Group added successfully.');
    }
}
