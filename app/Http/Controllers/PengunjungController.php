<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\TabelKunjungan;
use Session, Redirect;
use View;
use App\User;

class PengunjungController extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
    {
        $kunjungans = TabelKunjungan::all();
        $active = 'index';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;

        return View::make('templates.indexpengunjung')->with('kunjungans', $kunjungans)->with('role', $role)->with('active', $active);
    }


    public function create()
    {
        $active = 'create';
        if(!(Auth::user())){
            return redirect('/');
        }
        $role = Auth::user()->role;

        return View::make('templates.createpengunjung')->with('role', $role)->with('active', $active);

    }

    public function store()
    {
        $rules = array(
          'nama'       => 'required',
          'jumlah'      => 'required',
          'tanggal'       => 'required'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('pengunjung/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $pengunjung = new TabelKunjungan;
          $pengunjung->nama       = Input::get('nama');
          $pengunjung->jumlah      = Input::get('jumlah');
          $pengunjung->tanggal      = Input::get('tanggal');
          $pengunjung->save();

          // redirect
          Session::flash('message', 'Riwayat Kunjungan Baru Berahasil Ditambahkan');
          return Redirect::to('pengunjung');
      }
    }

    public function edit($id)
    {
      $active = 'edit';
      if(!(Auth::user())){
            return redirect('/');
        }
      $role = Auth::user()->role;
      $pengunjung = TabelKunjungan::find($id);

      return View::make('templates.editpengunjung')->with('pengunjung', $pengunjung)->with('role', $role)->with('active', $active);
    }

    public function update($id)
    {
      $rules = array(
          'nama'      => 'required',
          'jumlah'    => 'required',
          'tanggal'   => 'required'
      );

      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('sisabisa/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $kunjungan = TabelKunjungan::find($id);

          $kunjungan->nama = Input::get('nama');
          $kunjungan->jumlah = Input::get('jumlah');
          $kunjungan->tanggal = Input::get('tanggal');

          $kunjungan->save();

          // redirect
          Session::flash('message', 'Kunjungan Berhasil di Update');
          return Redirect::to('pengunjung');
    }
  }
    public function delete($id)
    {
      $post->delete();
      $active = 'index';
      $role = Auth::user()->role;

      return redirect()->route('templates.indexpengunjung')->with('role', $role)->with('active', $active);
    }
}
