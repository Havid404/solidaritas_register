<?php

namespace App\Http\Controllers\Member;

use App\FamiliesRelation;
use App\Family;
use App\Http\Controllers\Controller;
use App\JobEducation;
use App\Member;
use App\MemberOrganitation;
use App\Province;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function register(){

        $relations = FamiliesRelation::get();
        $provinces = Province::get();
        return view('auth.register', compact('relations','provinces'));
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(),
            [
                'name' => 'required',
                'nik' => 'required|numeric|digits_between:16,16',
                'email' => 'required|unique:users,email',
                'phone_number' => 'required|numeric|digits_between:11,12',
                'gender' => 'required',
                'address' => 'required',
                'place_birth' => 'required',
                'date_birth' => 'required|date',
                'married_status' => 'required',
                'kelurahan_id' => 'required',
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
                'photo' => 'required|image|mimes:jpg,jpeg,png,svg',
                'ktp_image' => 'required|image|mimes:jpg,jpeg,png,svg',

                'password' => 'required|min:6|confirmed',


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
                
                'kelurahan_id.required' => 'Kelurahan wajib diisi',

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

                'photo.required' => 'File Foto wajib diupload',
                'photo.image' => 'File Foto harus berupa gambar',
                'photo.mimes' => 'ekstensi yang diperbolehkan jpg/jpeg/png/svg',

                'ktp_image.required' => 'File Foto wajib diupload',
                'ktp_image.image' => 'File Foto harus berupa gambar',
                'ktp_image.mimes' => 'Ekstensi yang diperbolehkan jpg/jpeg/png/svg',

                'password.required' => 'Password wajib diisi',
                'password.confirmed' => 'Password yang anda masukkan tidak cocok'



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
        
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'user_type' => 'member'
    
            ]);
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput($request->all())->with('msg', $e->getMessage());
         
        }
        
        $photo = $request->file('photo');
        $size = $photo->getSize();
        $namePhoto = time() . "_" . $photo->getClientOriginalName();
        $path = 'images/foto_member';
        $photo->move($path, $namePhoto);
        $data['photo'] =  $namePhoto;

        $ktp = $request->file('ktp_image');
        $size = $ktp->getSize();
        $nameKtp = time() . "_" . $ktp->getClientOriginalName();
        $path = 'images/foto_ktp';
        $ktp->move($path, $nameKtp);
        $data['ktp_image'] =  $nameKtp;

        try {

            $member = Member::create([
                'nik' => $request->nik,
                'name' => $request->name,
                'user_id' => $user->id,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'place_birth' => $request->place_birth,
                'kelurahan_id' => $request->kelurahan_id,
                'date_birth' => $request->date_birth,
                'married_status' => $request->married_status,
                'wa_number' => $request->wa_number,
                'social_media' => $request->social_media,
                'photo' => $namePhoto,
                'ktp_image' => $nameKtp
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withInput($request->all())->with('msg', $e->getMessage());
            
        }

        try {
            $memberorganitation = MemberOrganitation::create([
                'member_id' => $member->id,
                'title_organitation' => $request->title_organitation,
                'organitation_name' => $request->organitation_name,
                'organitation_type' => $request->organitation_type
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withInput($request->all())->with('msg', $e->getMessage());
            
        }

        

        try {
            $jobeducation = JobEducation::create([
                'member_id' => $member->id,
                'education' => $request->education,
                'graduation_year' => $request->graduation_year,
                'university_name' => $request->university_name,
                'job' => $request->job
                
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withInput($request->all())->with('msg', $e->getMessage());
            
        }
       

        try {
            $families = Family::create([
                'member_id' => $member->id,
                'relation_id' => $request->relation_id,
                'name_family' => $request->name_family,
                'phone_number' => $request->phone_number
    
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect()->back()->withInput($request->all())->with('msg', $e->getMessage());
            
        }

        DB::commit();
        return redirect()->route('login_form')->with('msg','Selamat anda berhasil mendaftar, mohon tunggu untuk verifikasi akun anda');

    }
}
