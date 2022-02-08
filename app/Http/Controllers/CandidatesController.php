<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
//import MailController
use App\Http\Controllers\MailController;

class CandidatesController extends Controller
{

    public function home()
    {
        $candidates = DB::table('candidates')->get();
        return view('home', ['candidates' => $candidates]);
    }

    public function createCandidate(Request $request){
        $candidateName= $request->input('candidateName');
        $candidateList= $request->input('candidateList');
        DB::table('candidates')->insert(
            ['name' => $candidateName, 'votes' => 0,'lista'=>$candidateList,'image'=>'default.png']
        );
        return \view('createCandidateForm');
    }


    public function votingPage()
    {
        if(!Auth::check())//Check if is logged in
        {
            return \redirect('/register');
        }
        //check if user has voted or not
        else if(!Auth::user()->has_voted){
            
            $candidates = DB::table('candidates')->get();
            return view('voting',['candidates'=>$candidates]);
        }
        else if(now()>date('2020-02-01 00:00:00'))
        {
            return \redirect('/')->with('messageProblem','Las votaciones ya finalizaron');
        }
        else{

            //El usuario ya votó
            //return view('home');
            return \redirect('/')->with('messageProblem','Ya has votado');
        }
       
    }

    public function createCandidateForm()
    {
        if(Auth::check() && Auth::user()->is_admin){
            return \view('../candidato/create');
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }
        return view('../candidato/create');
    }
    public function editcandidate()
    {
        if(Auth::check() && Auth::user()->is_admin){
            $candidates = DB::table('candidates')->get();
            return view('../candidato/edit',['candidates'=>$candidates]);
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }
        return view('../candidato/edit');
    }
    
    public function castYourVote(Request $request)
    {
        //Check if user has voted or not
         
        if(!Auth::user()->has_voted){
            $candidateId = $request->input('candidateId');
            //Guardando votos
            DB::table('candidates')->where('id', $candidateId)
            ->update(['votes' => DB::raw('votes + 1')]);

            DB::table('users')->where('id', Auth::user()->id)
            ->update(['has_voted' => 1]); //1 or 0

            
            return \redirect('/')->with('message', 'Gracias por votar!');
        }
        else{
            return \redirect('/')->with('messageProblem','Ya has votado');
        }
    }

    public function uploadCsv()
    {
        if(Auth::check() && Auth::user()->is_admin){
            if(now()<date('2022-02-08 00:00:00')){
                return \view('uploadCsv');
            }
            else{
                return \redirect('/')->with('messageProblem','Las votaciones ya han comenzado');
            }
            //return \view('uploadCsv');
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }
    }

    public function subir_archivo()
    {
        if(Auth::check() && Auth::user()->is_admin){
            //return \redirect('/')->with('message','Padrón electoral cargado correctamente');
            //verify date
            if(now()<date('2022-12-12 00:00:00')){
                return \view('subir_archivo')->with('message','Padrón electoral cargado correctamente');
            }
            else{
                return \redirect('/')->with('messageProblem','Las votaciones ya han comenzado');
            }
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }
    }

    public function modifyCandidateForm()
    {
        return \view('modifyCandidateForm');
    }

    public function manageCandidates()
    {
        if(Auth::check() && Auth::user()->is_admin){
            $candidates = DB::table('candidates')->get();
            return view('manageCandidates',['candidates'=>$candidates]);
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }
    }

    public function addCandidates()
    {
        if(Auth::check() && Auth::user()->is_admin){
            $candidates = DB::table('candidates')->get();
            return view('addCandidates',['candidates'=>$candidates]);
        }
        else{
            return \redirect('/')->with('messageProblem','No tienes permisos para acceder a esta página');
        }
    }

    public function deleteCandidates(Request $request)
    {
        $id = $_GET['id'];

        //deleting the row from table
        $result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");
    }
    

    public function resultados()

    {



        if(now()<date('2023-02-01 00:00:00'))

        {

            $candidates = DB::table('candidates')->get();

            return view('resultados', ['candidates' => $candidates]);

        }

        else

        {

           return redirect('/');

        }

       

    }

    //Auditoria
    public function auditoria(Request $request)
    {
        if(Auth::check() && Auth::user()->is_admin){
            $auditoria = DB::table('auditoria_candidates')->get();
            //return view('auditoria',['auditoria'=>$auditoria]); 
            $pdf = PDF::loadView('auditoria',['auditoria'=>$auditoria]);
            //$pdf->loadHTML('<h1>Test</h1>');
            return $pdf->stream();
        }
    }

}
