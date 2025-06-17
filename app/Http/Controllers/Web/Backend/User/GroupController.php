<?php

namespace App\Http\Controllers\Web\Backend\User;

use Inertia\Inertia;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GroupContact;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function group()
    {
        $groups = Group::all();
        return Inertia::render('user_dashboard/Group/Index', compact('groups'));
    }

    public function groupStore(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255',
        ]);

        Group::create([
            'user_id' => Auth::id(),
            'group_name' => $request->group_name,
        ]);

        return redirect()->back()->with('message', 'Group created successfully.');
    }

    public function groupContact($id)
    {
        $user = Auth::user();
        $userGroup = Group::where('user_id', $user->id)->get();
        $groupContacts = GroupContact::with('group')->where('group_id', $id)->get();
        // return $groupContacts;

        return Inertia::render('user_dashboard/Group/GroupContact', compact('userGroup', 'groupContacts'));
    }

    public function groupContactStore(Request $request)
    {

        $request->validate([
            'group_id' => 'required|exists:groups,id',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => [
                'required',
                'regex:/^01[3-9][0-9]{8}$/', // Valid BD format
                function ($attribute, $value, $fail) {
                    $allowedPrefixes = ['013', '017', '014', '018']; // Example: GP + Robi
                    $prefix = substr($value, 0, 3);
                    if (!in_array($prefix, $allowedPrefixes)) {
                        $fail("The $attribute must be from an allowed mobile operator.");
                    }
                }
            ],
        ]);

        GroupContact::create([
            'group_id' => $request->group_id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);

        return redirect()->back()->with('message', 'Contact added to group successfully.');
    }

    public function groupContactEdit($id)
    {
        $contact = GroupContact::findOrFail($id);
        $userGroup = Group::where('user_id', Auth::id())->get();
        return Inertia::render('user_dashboard/Group/Edit', compact('contact', 'userGroup'));
    }

    public function groupContactUpdate(Request $request, $id)
    {
        $request->validate([
            'group_id' => 'required|exists:groups,id',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => [
                'required',
                'regex:/^01[3-9][0-9]{8}$/', // Valid BD format
                function ($attribute, $value, $fail) {
                    $allowedPrefixes = ['013', '017', '014', '018']; // Example: GP + Robi
                    $prefix = substr($value, 0, 3);
                    if (!in_array($prefix, $allowedPrefixes)) {
                        $fail("The $attribute must be from an allowed mobile operator.");
                    }
                }
            ],
        ]);

        $contact = GroupContact::findOrFail($id);
        $contact->update([
            'group_id' => $request->group_id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]);

        return redirect('group/contact/' . $request->group_id . '')->with('message', 'Contact updated successfully.');
    }

    public function groupDelete($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->back()->with('message', 'Group deleted successfully.');
    }

    public function groupContactDelete($id)
    {
        $contact = GroupContact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('message', 'Contact deleted successfully.');
    }
}
