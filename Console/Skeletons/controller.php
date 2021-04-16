<?php

namespace App\Http\Controllers;

use App\Models\_model_;
use Illuminate\Http\Request;

class _model_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = _model_::all();
        return view('_table_.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_table_.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, _model_ $_modelower_)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
        ]);

        $_modelower_->create($request->all());
        return redirect()->route('_table_.index')
        ->with('success','_model_ a bien été créé !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(_model_ $_modelower_)
    {
        return view('_table_.show',compact('_modelower_'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(_model_ $_modelower_)
    {
        return view('_table_.edit',compact('_modelower_'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, _model_ $_modelower_)
    {
        $request->validate([
            'name' => 'string',
        ]);
        $_modelower_->update($request->all());
        return redirect()->route('_table_.index')
        ->with('success','_modelower_ a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(_model_ $_modelower_)
    {
        $_modelower_->delete();
  
        return redirect()->route('_table_.index')
                        ->with('success','_model_ a bien été supprimé !');
    }
}
