<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\prodi;


class ProdiController extends Controller
{
    public function index() {
        $prodis = Prodi::all();
        return view('prodi.index')->with('prodis', $prodis);
    }
    public function allJoinFacade() {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select mahasiswas.*,prodis.nama as nama_prodi from prodis, mahasiswas where prodis.id = mahasiswas.prodi_id');
        return view('prodi.index', ['allmahasiswaprodi' => $result, 'kampus' => $kampus]);

    }
    public function allJoinElq() {

        $prodis = prodi::with('mahasiswas')->get();
        foreach ($prodis as $prodi) {
            echo "<h3>[$prodi->nama]</h3>";
            echo "<hr>Mahasiswa: ";
            foreach ($prodi->mahasiswas as $mhs) {
                echo $mhs->nama_mahasiswa .", ";
            }
            echo "<hr>";
        }
    }

    public function create(){
        return view('prodi.create');
    }
    public function store(Request $request){
        // dump($request);
        // echo $request->nama;

        $validateData =$request->validate(['nama' =>'required|min:5|max:20']);
        // dump($validatedata);
        // echo $validatedata['nama'];

        $prodi = new Prodi();
        $prodi->nama = $validateData['nama'];
        $prodi->save();

        $request->session()->flash('info', "Data prodi $prodi->nama berhasil disimpan ke database");
        return redirect('prodi/create');
    }
}
