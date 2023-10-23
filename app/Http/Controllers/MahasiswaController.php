<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function insert(){
        $result = DB::insert('insert into mahasiswas (npm, nama, tempat_lahir, Tanggal_lahir, created_at) values (?, ?, ?, ?, ?)',['2226250040', 'Immanuel', 'palembang','2004-10-07', now()]);
        dump($result);
    }

    public function update(){ 
        $result = DB::update('update mahasiswas set nama = "iman", updated_at = now() where npm = ?', ['2226250040']);
        dump($result);
    }

    public function delete(){ 
        $result = DB::delete('delete from mahasiswas where npm = ?', ['2226250040']);
        dump($result);
    }
    public function select(){ 
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' =>$result, 'kampus' => $kampus]);
    }

      public function insertQb() {
        $result = DB::table('mahasiswas')->insert(
            [
                'npm' => '2226250103',
                'nama_mahasiswa' => 'Alvin Hujaya',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '2004-10-02',
                'alamat' => 'Jl Jend Sudirman',
                'created_at' => now()
            ]
        );
        dump($result);
    }

    public function updateQb() {
        $result = DB::table('mahasiswas')
        ->where('npm', '2226250103')
        ->update(
            [
                'nama_mahasiswa' => 'usman',
                'updated_at' => now()
            ]
        );
        dumb($result);
    }

    public function deleteQb() {
        $result = DB::table('mahasiswas')
        ->where('npm', '=', '2226250103')
        ->delete();
        dump($result);
    }

    public function selectQb() {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        return view('mahasiswas.index');
    }
    
    public function insertElq() {
        $mahasiswas = new Mahasiswa;
        $mahasiswas->npm = '2226250103';
        $mahasiswas->nama = 'Alvin Hujaya';
        $mahasiswas->tempat_lahir = 'Palembang';
        $mahasiswas->tanggal_lahir = '2004-10-02';
        $mahasiswas->save();
        dumb($mahasiswa);
    }

    public function updateElq() {
        $mahasiswas = Mahasiswa::where('npm', '2226250103')->first();
        $mahasiswas->nama = 'Kevin';
        $mahasiswas->save();
        dumb($mahasiswa);
    }

    public function deleteElq() {
        $result = Mahasiswa::where('npm', '2226250103')->first();
        $mahasiswas->delete();
        dumb($mahasiswa);
    }

    public function SelectElq() {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswas = $mahasiswas::all();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswas, 'kampus' => $kampus]);
    }
}

