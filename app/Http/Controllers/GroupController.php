<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        //get posts
        $groups = DB::table('groups')
                ->join('users', 'users.id', '=', 'groups.user_id')
                ->select('groups.id', 'users.name as user_name', 'groups.name as class_name')
                ->paginate(10);

        //render view with posts
        return view('groups.index', compact('groups'));
    }

    
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function destroy(Group $group)
    {
        //delete image
        Storage::delete('public/storage/'. $group->image);

        //delete post
        $group->delete();

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
