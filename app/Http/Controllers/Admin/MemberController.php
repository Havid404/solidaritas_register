<?php

namespace App\Http\Controllers\Admin;

use App\FamiliesRelation;
use App\Family;
use App\Http\Controllers\Controller;
use App\JobEducation;
use App\Member;
use App\MemberOrganitation;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MemberController extends Controller
{
    // public function index(){

    //     $members = Member::with('education')->when(Auth::user()->user_type == 'member', function($query){
    //         return $query->where('id', Auth::user()->member->id);
    //     })->get();
    //     return view ('admin.member_request', compact('members'));
    // }
    public function index()
    {
        $members = Member::where('is_active',true)->with('education')->when(Auth::user()->user_type == 'member', function($query){
            return $query->where('id', Auth::user()->member->id);
        })->get();
        return view('admin.member.index', compact('members'));
    }
    public function edit($id)
    {
        $detail = Member::find($id);
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('layout_detail', $id)));

        $relations = FamiliesRelation::get();
        $provinces = Province::get();

        $organization = MemberOrganitation::where('member_id', $detail->id)->first();
        $family = Family::where('member_id', $detail->id)->first();
        return view('admin.member.edit', compact('detail','qrcode','organization','family','relations','provinces'));
    }
    
    public function show($id)
    {
        $detail = Member::find($id);
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('layout_detail', $id)));

        $relations = FamiliesRelation::get();
        $provinces = Province::get();

        $organization = MemberOrganitation::where('member_id', $detail->id)->first();
        $family = Family::where('member_id', $detail->id)->first();
        return view('admin.member.show', compact('detail','qrcode','organization','family','relations','provinces'));
    }
    public function update(Request $request)
    {
        if($request->password){
            $validation = Validator::make($request->all(),
             [
                'password' => 'required|min:6|confirmed',
            ], 
            [
                'password.required' => 'Password wajib diisi',
                'password.confirmed' => 'Password yang anda masukkan tidak cocok'
            ]);
            if ($validation->fails())
            {
                return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validation)
                ->with('msg',$validation->getMessageBag()->first());
    
            }
        }
        $member = Member::find($request->member_id);
        $data['ktp_image'] = $member->ktp_image;
        $data['photo'] = $member->photo;
        if($request->photo){
            $validation = Validator::make($request->all(),
             [
                'photo' => 'required|image|mimes:jpg,jpeg,png,svg',
            ], 
            [
                'photo.required' => 'File Foto wajib diupload',
                'photo.image' => 'File Foto harus berupa gambar',
                'photo.mimes' => 'ekstensi yang diperbolehkan jpg/jpeg/png/svg',
            ]);
            if ($validation->fails())
            {
                return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validation)
                ->with('msg',$validation->getMessageBag()->first());
    
            }
            if($request->photo){
                $photo = $request->file('photo');
                $size = $photo->getSize();
                $namePhoto = time() . "_" . $photo->getClientOriginalName();
                $path = 'images/foto_member';
                $photo->move($path, $namePhoto);
                $data['photo'] =  $namePhoto;
            }
        }
        if($request->ktp_image){
            $validation = Validator::make($request->all(),
             [
                'ktp_image' => 'required|image|mimes:jpg,jpeg,png,svg',
            ], 
            [
                'ktp_image.required' => 'File Foto wajib diupload',
                'ktp_image.image' => 'File Foto harus berupa gambar',
                'ktp_image.mimes' => 'Ekstensi yang diperbolehkan jpg/jpeg/png/svg',
            ]);
            if ($validation->fails())
            {
                return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors($validation)
                ->with('msg',$validation->getMessageBag()->first());
    
            }
            
            if($request->ktp_image){
                $ktp = $request->file('ktp_image');
                $size = $ktp->getSize();
                $nameKtp = time() . "_" . $ktp->getClientOriginalName();
                $path = 'images/foto_ktp';
                $ktp->move($path, $nameKtp);
                $data['ktp_image'] =  $nameKtp;
            }
        }
        if($request->province_id){
            $validation = Validator::make($request->all(),
                [
                    'kelurahan_id' => 'required',
                ],
                [
                    'kelurahan_id.required' => 'Kelurahan wajib diisi',
                ]
            );
        }
        $validation = Validator::make($request->all(),
            [
                'name' => 'required',
                'nik' => 'required|numeric|digits_between:16,16|unique:members,nik,'. $request->member_id,
                'email' => 'required|unique:users,email,'. $member->user_id,
                'phone_number' => 'required|numeric|digits_between:11,12',
                'gender' => 'required',
                'address' => 'required',
                'place_birth' => 'required',
                'date_birth' => 'required|date',
                'married_status' => 'required',
                'education' => 'required',
                'graduation_year' => 'required',
                'university_name' => 'required',
                'job' => 'required',
                'name_family' => 'required',
                'title_organitation' => 'required',
                'organitation_name' => 'required',
                'organitation_type' => 'required',
                'wa_number' => 'required|numeric|digits_between:11,12',
                'social_media' => 'required',

            ], 
            [
                'name.required' => 'Nama wajib diisi',

                'nik.required' => 'Nik tidak boleh kosong',
                'nik.numeric' => 'Nik harus menggunakan angka',
                'nik.digits_between' => 'Jumlah Nik harus 16 angka',

                'email.required' => 'Email wajib diisi',
                'email.unique:users,email' => 'Email sudah pernah didaftarkan',

                'phone_number.required' => 'Nomer wajib diisi',
                'phone_number.numeric' => 'Nomer wajib diisi dengan angka',
                'phone_number.digits_between' => 'Nomer Handphone maksimal nomer hanya 12 digit',

                'gender.required' => 'Pilih jenis kelamin anda',
                'address.required' => 'Alamat wajib diisi',
                'place_birth.required' => 'Tempat Lahir wajib diisi',
                'date_birth.required' => 'Tanggal Lahir wajib diisi',
                'date_birth.date' => 'Hanya diisi dengan format yyyy-mm-dd',
                'married_status.required' => 'Status Perkawinan wajib diisi',

                'education.required' => 'Pendidikan terahir wajib diisi',
                'graduation_year.required' => 'Tahun lulus wajib diisi',
                'university_name.required' => 'Nama Universitas wajib diisi',
                'job.required' => 'Pekerjaan wajib disii',

                'name_family.required' => 'Keluarga wajib diisi',
                'title_organitation.required' => 'Pilih jabatan anda',
                'organitation_name.required' => 'Nama organisasi wajib diisi',
                'organitation_type,required' => 'jenis organisasi wajib diisi',

                'wa_number.required' => 'Nomer wajib diisi',
                'wa_number.numeric' => 'Nomer wajib diisi dengan angka',
                'wa_number.digits_between' => 'Maksimal nomer wa hanya 12 digit',
                'social_media.required' => 'Sosial media wajib diisi',
            ]
        );
        if ($validation->fails())
        {
            return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors($validation)
            ->with('msg',$validation->getMessageBag()->first());

        }

        $member->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'place_birth' => $request->place_birth,
            'kelurahan_id' => $request->kelurahan_id == null ? $member->kelurahan_id : $request->kelurahan_id,
            'date_birth' => $request->date_birth,
            'married_status' => $request->married_status,
            'wa_number' => $request->wa_number,
            'social_media' => $request->social_media,
            'photo' => $data['photo'],
            'ktp_image' => $data['ktp_image']
        ]);
        $memberorganitation = MemberOrganitation::where('member_id', $member->id)->update([
            'member_id' => $member->id,
            'title_organitation' => $request->title_organitation,
            'organitation_name' => $request->organitation_name,
            'organitation_type' => $request->organitation_type
        ]);
        $jobeducation = JobEducation::where('member_id', $member->id)->update([
            'member_id' => $member->id,
            'education' => $request->education,
            'graduation_year' => $request->graduation_year,
            'university_name' => $request->university_name,
            'job' => $request->job
            
        ]); $families = Family::where('member_id', $member->id)->update([
            'member_id' => $member->id,
            'relation_id' => $request->relation_id,
            'name_family' => $request->name_family,
            'phone_number' => $request->phone_number

        ]);
        $user = User::find($member->user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password == null ? $user->password : bcrypt($request->password),
            'user_type' => 'member',
        ]);
        return redirect(route('admin.member.index'))->with('success','Data berhasil diubah');
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

    public function detailRequest(){
        $detail = Member::find($id);
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(route('layout_detail', $id)));

        $organization = MemberOrganitation::where('member_id', $detail->id)->first();
        $family = Family::where('member_id', $detail->id)->first();
        return view('admin.request_detail', compact('detail','qrcode','organization','family'));  
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
    public function delete($id)
    {
        $member = Member::find($id);
        $member->delete();
        User::find($member->user_id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus member');
    }

}
