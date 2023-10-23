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
        $mahasiswa = new Mahasiswa;
        $mahasiswa->npm = '2226250103';
        $mahasiswa->nama = 'Alvin Hujaya';
        $mahasiswa->tempat_lahir = 'Palembang';
        $mahasiswa->tanggal_lahir = '2004-10-02';
        $mahasiswa->save();
        dumb($mahasiswa);
    }

    public function updateElq() {
        $mahasiswa = Mahasiswa::where('npm', '2226250103')->first();
        $mahasiswa->nama = 'Kevin';
        $mahasiswa->save();
        dumb($mahasiswa);
    }

    public function deleteElq() {
        $result = Mahasiswa::where('npm', '2226250103')->first();
        $mahasiswa->delete();
        dumb($mahasiswa);
    }

    public function selectElq() {
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswas = $mahasiswa::all();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswas, 'kampus' => $kampus]);
    }
}

