<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Member;
use App\MemberOrganitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function qrcode($id)
    {
        $detail = Member::find($id);
        $organization = MemberOrganitation::where('member_id', $detail->id)->first();
        return view('welcome', compact('detail','organization'));
    }
}
