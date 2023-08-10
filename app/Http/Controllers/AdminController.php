<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Imports\CandidateImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function dashboard()
    {
      
        return view('admin.dashboard');
        
    }

    public function profile(){
        return view('admin.profil');
    }
    
    public function profileform(){
        return view('admin.formprofil');
    }

    public function updateprofile(Request $request, $id){
        $data_user = User::find($id);
        $data_user -> update($request->all());
      
        $request->session()->flash('editsukses', 'Data User Berhasil Diubah');
        return redirect('/profile');
    }

    public function userdata(Request $request) {
        $data_user = User::all();
        
        return view('user.datauser', ['users' => $data_user]);
    }

    public function formuser(){
        $data_role = Role::all();
        return view('user.formuser', ['roles' => $data_role]);
    }

    public function createuser(Request $request) {
        $data_user = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password)
            
        ];
        $save_user = User::create($data_user);

        $data_role = [
            "user_id" => $save_user->id,
            "role_id" => $request->role
        ];
        UserRole::create($data_role);
        $request->session()->flash('sukses', 'Data User Berhasil Ditambahkan');
        return redirect('/userdata');
    }

    public function edituser($id) {
        $data_user = User::find($id);
        $data_role = UserRole::find($id);
        return view('user.edituser', ['user' => $data_user,'roles' => $data_role]);
    }

    public function updateuser(Request $request, $id){
        $data_user = User::find($id);
        $data_user -> update($request->all());
      
        $request->session()->flash('editsukses', 'Data User Berhasil Diubah');
        return redirect('/userdata');
    }

    public function deleteuser(Request $request, $id){
        $data_user = User::find($id);
        $data_user -> delete();
        $request->session()->flash('hapus', 'Data User Berhasil Dihapus');
        return redirect('/userdata');
    }

    public function candidate(Request $request)
    {
        $data_candidate= Candidate::all();
        return view('admin.candidate', ['candidates'=>$data_candidate]);
    }

    public function importexcel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder  di dalam folder public
		$file->move('file_warga',$nama_file);
 
		// import data
		Excel::import(new CandidateImport, public_path('/file_warga/'.$nama_file));
 
		
 
		// alihkan halaman kembali
		return redirect('/candidates');
    }

    public function formcandidate()
    {
        return view('admin.formcandidate');
    }

    public function createcandidate(Request $request) {
        $data_candidate = [
            "nik" => $request->nik,
            "name" => $request->name,
            "penghasilan" => $request->penghasilan,
            "tabungan" => $request->tabungan,
            "tanggungan" => $request->tanggungan,
            "jumlah_kepala_keluarga" => $request->jumlah_kepala_keluarga

        ];
        $save_user = Candidate::create($data_candidate);
        $request->session()->flash('sukses', 'Data Candidate Berhasil Ditambahkan');
        return redirect('/candidates');
    }

    public function editcandidate($id) {
        $data_candidate = Candidate::find($id);
        return view('admin.editcandidate', ['candidates' => $data_candidate]);
    }

    public function updatecandidate(Request $request, $id){
        $data_candidate = Candidate::find($id);
        $data_candidate -> update($request->all());
        $request->session()->flash('editsukses', 'Data Calon Berhasil Diubah');
        return redirect('/candidates');
    }

    public function deletecandidate(Request $request, $id){
        $data_candidate = Candidate::find($id);
        $data_candidate -> delete();
        $request->session()->flash('hapus', 'Data Calon Berhasil Dihapus');
        return redirect('/candidates');
    }

    public function criteria()
    {
        return view('admin.criteria');
    }

    
    public function subcriteria($id)
    {
        $data['criterias'] = criteria::find($id);
        $data['subcriterias'] = subcriteria::where('criteria_id', $data['criterias']->id)->get();
    //    return $data;
        return view('admin.subcriteria', $data);
    }

    public function formsubcriteria($id){
        $data['criterias'] = criteria::find($id);
        return view('admin.form_subcriteria', $data);
    }

    public function createsubcriteria(Request $request) {
        $data_subcriteria = [
            "criteria_id" => $request->criteria_id,
            "subcriteria_code" => $request->subcriteria_code,
            "start" => $request->start,
            "end" => $request->end,
            
        ];
        $save_subcriteria = Subcriteria::create($data_subcriteria);

        $request->session()->flash('sukses', 'Data SubCriteria Berhasil Ditambahkan');
        return redirect()->route("subcriteria",$request->criteria_id);
    }

    public function editsubcriteria($id, $subid) {
        $data['criterias'] = criteria::find($id);
        $data['subcriterias'] = Subcriteria::find($subid);
        
        return view('admin.editsubcriteria', $data);
    }

    public function updatesubcriteria(Request $request, $id){
        $data['criterias'] = criteria::find($id);
        $data['subcriteria'] = Subcriteria::find($id);
        $data['subcriteria']  -> update($request->all());
        $request->session()->flash('editsukses', 'Data Subkriteria Berhasil Diubah');
        return redirect()->route("subcriteria",$request->criteria_id);
    }

    public function destroy($id)
    {
        try {
            Subcriteria::destroy($id);

            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

  
}
