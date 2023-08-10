<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class OperatorController extends Controller
{
    public function dashboard()
    {
      
        return view('operator.dashboard');
        
    }

    public function candidate(Request $request)
    {
        $data_candidate= Candidate::all();
        return view('operator.candidate', ['candidates'=>$data_candidate]);
    }

    public function formcandidate()
    {
        return view('operator.formcandidate');
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
        return redirect('/operator/candidates');
    }

    public function editcandidate($id) {
        $data_candidate = Candidate::find($id);
        return view('operator.editcandidate', ['candidates' => $data_candidate]);
    }

    public function updatecandidate(Request $request, $id){
        $data_candidate = Candidate::find($id);
        $data_candidate -> update($request->all());
        $request->session()->flash('editsukses', 'Data Calon Berhasil Diubah');
        return redirect('/operator/candidates');
    }

    public function deletecandidate(Request $request, $id){
        $data_candidate = Candidate::find($id);
        $data_candidate -> delete();
        $request->session()->flash('hapus', 'Data Calon Berhasil Dihapus');
        return redirect('/operator/candidates');
    }

}
