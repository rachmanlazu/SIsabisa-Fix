<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\TabelKunjungan;
use App\Models\TabelKomoditas;
use View, Session, Redirect;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;

class DashboardController extends Controller
{
    public function post(){
        $active = 'post';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        return view('templates.tambahkaryawan1', compact('active', 'role'));
    }

    public function index(){
        $active = 'dashboard';
        $role = Auth::user()->role;
        $terbanyak = DB::table('Komoditas')->max('Stok');
        $namanya = DB::table('Komoditas')->where('Stok', $terbanyak)->value('Nama');
        $karyawan = DB::table('users')->where('status','=',0)->count();
        $data = \Lava::DataTable();
        $data->addDateColumn('Date')
             ->addNumberColumn('Jumlah Pengunjung');
        $kunjungan = TabelKunjungan::whereYear('tanggal','=',\Carbon\Carbon::now()->format('Y'))->OrderBy('tanggal')->get();
        $status = Auth::user()->status;

        $sum = 0;
        $bef = "111";
        foreach($kunjungan as $k){
          if ($bef == "111"){
            $sum = $k->jumlah;
            $bef = $k->tanggal;
          } else{
            if (\Carbon\Carbon::parse($bef)->format('m') == \Carbon\Carbon::parse($k->tanggal)->format('m')){
              $sum+=$k->jumlah;
              $bef = $k->tanggal;
            } else{
              $data->addRow([$bef,$sum]);
              $sum = $k->jumlah;
              $bef = $k->tanggal;
            }
          }
        }
        $data->addRow([$bef,$sum]);
        \Lava::LineChart('Temps',$data,['title'=>'Jumlah Pengunjung']);
        $data = \Lava::DataTable();
        $data->addStringColumn('Nama komoditas')
             ->addNumberColumn('Hasil Pertanian');
        $kunjungan = TabelKomoditas::whereYear('updated_at','=',\Carbon\Carbon::now()->format('Y'))->OrderBy('Nama')->get();
        $sum = 0;
        $bef = "111";
        foreach($kunjungan as $k){
          if ($bef == "111"){
            $sum = $k->Stok;
            $bef = $k->Nama;
          } else{
            if ($bef == $k->Nama){
              $sum+=$k->Stok;
              $bef = $k->Nama;
            } else{
              $data->addRow([$bef,$sum]);
              $sum = $k->Stok;
              $bef = $k->Nama;
            }
          }
        }
        $data->addRow([$bef,$sum]);
        \Lava::ColumnChart('Temps1',$data,['title'=>'Komoditas']);
        return View::make('templates.isi-dashboard')->with('terbanyak', $terbanyak)->with('karyawan', $karyawan)->with('namanya', $namanya)->with('active', $active)->with('role', $role)->with('status',$status);
    }


    public function show(){
        $active = 'show';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;
        $karyawans = User::all();

        return View::make('templates.daftarkaryawan', compact('active','role'))->with('karyawans', $karyawans)->with('active', $active)->with('role', $role);
    }

    public function edit($id)
    {
      $active = 'edit';
      if(!(Auth::user())){
            return redirect('/');
        }
      $role = Auth::user()->role;
      $karyawan = User::find($id);

      return View::make('templates.aturkaryawan')->with('karyawan', $karyawan)->with('role', $role)->with('active', $active);
    }

    public function update($id)
    {
      $rules = array(
          'name'        => 'required',
          'nim'         => 'required',
          'status'      => 'required'
      );

      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('sisabisa/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $karyawan = User::find($id);
          $karyawan->name = Input::get('name');
          $karyawan->nim = Input::get('nim');
          $karyawan->status = Input::get('status');
          $karyawan->save();

          // redirect
          Session::flash('message', 'Status Berhasil di Update');
          return Redirect::to('daftar-karyawan');
    }
}
}
