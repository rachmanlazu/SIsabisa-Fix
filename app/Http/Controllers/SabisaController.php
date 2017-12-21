<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\TabelKomoditas;
use App\Models\TabelHistori;
use Session, Redirect;
use View;
use App\User;

class SabisaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    // get all the nerds
      $active = 'index';
      if(!(Auth::user())){
            return redirect('/');
        }
      $role = Auth::user()->role;
      $sisabisas = TabelKomoditas::all();

    // load the view and pass the nerds
      return View::make('templates.index')
          ->with('sisabisas', $sisabisas)
          ->with('role', $role)->with('active', $active);
  }

  public function create()
  {
      $active = 'index';
      if(!(Auth::user())){
            return redirect('/');
        }
      $role = Auth::user()->role;

      return View::make('templates.create')->with('active', $active)->with('role', $role);
  }

  public function store()
  {
      $rules = array(
          'nama'       => 'required',
          'stok'      => 'required'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('sisabisa/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $sisabisa = new TabelKomoditas;
          $sisabisa->Nama       = Input::get('nama');
          $sisabisa->Stok      = Input::get('stok');
          $sisabisa->save();

          // redirect
          Session::flash('message', 'Komoditas Baru Berahasil Ditambahkan');
          return Redirect::to('sisabisa');
      }
    }

  public function show($id)
  {
      $sisabisa = TabelKomoditas::find($id);

      // show the view and pass the nerd to it
      return View::make('templates.index')
          ->with('sisabisa', $sisabisa);
  }

  public function edit($id)
  {
      $sisabisa = TabelKomoditas::find($id);
      $active = 'edit';
      $role = Auth::user()->role;

      if($sisabisa->isEdited==0){

        TabelKomoditas::where('id',$id)->update(array('isEdited'=>1));

       // $sisabisa->isEdited==1;
       // $sisabisa->save();

          return View::make('templates.edit')
          ->with('sisabisa', $sisabisa)->with('active', $active)->with('role', $role);
      }

      else {
      // show the edit form and pass the nerd
          return View::make('templates.fail')->with('active', $active)->with('role', $role);
      }
  }

  public function update($id)
  {
      $rules = array(
          'stok'      => 'required'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('sisabisa/' . $id . '/edit')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $sisabisa = TabelKomoditas::find($id);
          $histori = new TabelHistori;
          $pengubah = Auth::user()->name;

          $histori->id_stok = $id;
          $histori->jumlahawal = $sisabisa->Stok;

          $sisabisa->Stok = Input::get('stok');
          $sisabisa->isEdited = 0;

          $histori->jumlahakhir = Input::get('stok');
          $histori->pengubah = $pengubah;

          $sisabisa->save();
          $histori->save();

          // redirect
          Session::flash('message', 'Stok Berhasil di Update');
          return Redirect::to('sisabisa');
      }
  }

  public function destroy($id)
  {
      $sisabisa = TabelKomoditas::find($id);
      $sisabisa->delete();

      // redirect
      Session::flash('message', 'Komoditas Berhasil Dihapus');
      return Redirect::to('sisabisa');
  }
}
