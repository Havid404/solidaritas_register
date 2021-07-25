<?php

namespace App\Http\Controllers\Admin;

use App\Family;
use App\Http\Controllers\Controller;
use App\JobEducation;
use App\Member;
use App\MemberOrganitation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MemberController extends Controller
{
    public function index(){

        $members = Member::with('education')->when(Auth::user()->user_type == 'member', function($query){
            return $query->where('id', Auth::user()->member->id);
        })->get();
        return view ('admin.member_request', compact('members'));
    }

    public function datamember(){
        $members = Member::where('is_active',true)->with('education')->when(Auth::user()->user_type == 'member', function($query){
            return $query->where('id', Auth::user()->member->id);
        })->get();
        return view ('admin.member', compact('members'));
    }

    public function detailMember($id){
        $detail = Member::find($id);
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('layout_detail', $id)));

        $organization = MemberOrganitation::where('member_id', $detail->id)->first();
        $family = Family::where('member_id', $detail->id)->first();
        return view('admin.member_detail', compact('detail','qrcode','organization','family'));  
    }

    public function cetak($id){
        $member = Member::find($id);
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('layout_detail', $id)));

        $pdf = PDF::loadview('admin.cetak',compact('member','qrcode'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
    public function detail($id){
        $detail = Member::find($id);
        $organization = MemberOrganitation::where('member_id', $detail->id)->first();
        $family = Family::where('member_id', $detail->id)->first();
        return view('welcome', compact('detail','organization','family'));
    }
    public function approve($id)
    {
        $member = Member::find($id);

        if($member->is_active == false){
            Member::find($id)->update(['is_active'=>true]); 
            return redirect()->back()->with('success', 'Berhasil di setujui sebagai member');
        }else{
            Member::find($id)->update(['is_active'=>false]); 
            return redirect()->back()->with('success', 'Berhasil di blokir dari member');
        }
    }

}
