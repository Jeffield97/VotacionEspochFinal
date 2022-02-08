<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Candidato;
use Illuminate\Support\Facades\Auth;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all the candidates
        if(Auth::check() && Auth::user()->is_admin){
            $candidates = DB::table('candidates')->get();
            return view('candidato.index',['candidates'=>$candidates]);
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }
      

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(Auth::check() && Auth::user()->is_admin){
            return view('candidato.create');
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Auth::check() && Auth::user()->is_admin){
            $candidateName= $request->input('candidateName');
            $candidateList= $request->input('candidateList');
            DB::table('candidates')->insert(
            ['name' => $candidateName, 'votes' => 0,'lista'=>$candidateList,'image'=>'default.png']
        );
        return redirect('/candidates');
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check() && Auth::user()->is_admin){
            //$candidate = DB::table('candidates')->where('id', $id);
            $candidate= DB::table('candidates')->where('id', $id)->first();
            return view('candidato.edit')->with('candidate',$candidate);
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }
        

      

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(Auth::check() && Auth::user()->is_admin){
            // $candidatecandidate= Candidato::find($id);
            $candidate = DB::table('candidates')->where('id', $id);
            $candidate->name= $request->input('candidateName');
            $candidate->lista= $request->input('candidateList');
            //$candidate->save();


            DB::table('candidates')->where('id', $id)->update(
                ['name' => $request->input('candidateName'),'lista'=>$request->input('candidateList')]
            );
            
            return redirect('/candidates');
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }

       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check() && Auth::user()->is_admin){
            $candidate = DB::table('candidates')->where('id', $id)->delete();
            return redirect('/candidates');
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }
        
    }
}
