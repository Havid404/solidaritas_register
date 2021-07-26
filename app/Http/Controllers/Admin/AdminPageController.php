<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use App\Admin;
use App\User;
class AdminPageController extends Controller
{
    public function beranda(){
        $menunggu1M = Member::where('is_active', false)->count();
        $member1M = Member::where('is_active', true)->count();
        $admin1M = User::where('user_type','admin')->count();
        $pengguna1M = User::count();
        return view ('admin.beranda', compact('menunggu1M','member1M','admin1M','pengguna1M'));
    }

}
