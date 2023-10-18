<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller    //jika --api harus json, kalau --resources harus tipe resource
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data = [
        ['id' =>1, 'nama' =>'Hocwin Hebert'],
        ['id' =>2, 'nama' =>'Adrian']
    ];
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}