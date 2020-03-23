<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use App\Matieres;
use App\Composer;
use App\Etudiants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignUpMail;

class MainController extends Controller
{
    //traitement de la racine
    public function index(){
         return view('accueil');
    }  
    public function inscription(){
      if (Session::has("id_etu")){
         return redirect(route('dashboard'));
      }else{
         $fillieres= DB::table("Fillieres")->get();
         return view('inscription',compact('fillieres'));
      }
    }
    public function connexion(){
      if (Session::has("id_etu")){
        return redirect(route('dashboard'));
     }else{
        return view('connexion');
      }
    }
    public function verification_connexion( Request $request){

      $this->validate($request,
      [
        "pseudo"=>"required|alpha|min:2",
       "password"=>"required|min:8|alpha_num",
       "cpassword"=>"required|same:password|min:8|alpha_num"
      ]);
      $etudiant= DB::table('Etudiants')->where('pseudo',$request->pseudo)
      ->where('password',md5($request->password))->first();
      if($etudiant){
        Session::put("id_etu",$etudiant->num_mat);
        return redirect(route('dashboard'));
      }else{
        Session::flash("erreur","vos donnés sont incorrectes");
        return view("connexion");
      }
    }
    public function verification_inscription(Request $request){

     $this->validate($request,
     [
      "nom"=>"required|alpha|min:2",
      "prenom"=>"required|alpha|min:2",
      "pseudo"=>"required|alpha|min:2",
      "email"=>"required|email",
      "password"=>"required|min:8|alpha_num",
      "cpassword"=>"required|same:password|min:8|alpha_num",
      "profile"=>"required"
     ]);
      $nomPhoto=time().$request->pseudo.'.'.$request->profile->getClientOriginalExtension();
      $request->profile->move(public_path('images'),$nomPhoto);
      $inscription=Etudiants::create(
                              ["nom"=>$request->nom,
                              "prenom"=>$request->prenom,
                              "pseudo"=>$request->pseudo,
                              "email"=>$request->email,
                              "password"=>md5($request->password),
                              "code_fil"=>"IRT",
                              "profile"=>$nomPhoto
                              ]
                            );

                            if($inscription){
                           //   Mail::to($request->email)->send(new SignUpMail($request->nom,$request->prenom));
                            return redirect(route('connexion'));
                            }
    }
    public function dashboard(Request $request){
      if (Session::has("id_etu")){
        $notes= DB::table('Etudiants')
        ->join('Composer','Etudiants.num_mat','=','Composer.num_mat')
        ->join('Matieres','Composer.code_mat','=','Matieres.code_mat')
        ->select('Matieres.*','Composer.note','Etudiants.*')
        ->where('Etudiants.num_mat','=',$request->session()->get('id_etu'))
        ->get();
        return view('dashboard',compact('notes'));
     }else{
      return view('accueil');
     }
     }
     public function deleteNote(Request $request ){
      if (Session::has("id_etu")){
          $idcorect=Composer::where('code_mat',$request->id)
          ->where('num_mat',$request->session()->get('id_etu'))->first();
          if($idcorect){
            $idcorect=Composer::where('code_mat',$request->id)
            ->where('num_mat',$request->session()->get('id_etu'))
            ->delete();
             return redirect(route('dashboard'));
          }else{
            return redirect(route('dashboard'));
          }

      }else{
        return view('accueil');
      }

     }
     public function modifierNote(Request $request){
      if (Session::has("id_etu")){
        $idcorect=Composer::where('code_mat',$request->id)
        ->where('num_mat',$request->session()->get('id_etu'))->first();
        if($idcorect){
          $matieres= Matieres::where('code_mat',$request->id)->first();
         return view('modifierNote',compact('matieres','idcorect'));
     
        }else{
          return redirect(route('dashboard'));
        }
      }else{
        return view('accueil');
      }

     }
     public function modifierNote_v(Request $request){
      if (Session::has("id_etu")){
        $this->validate($request,
        [
          "note"=>"required|numeric|gte:0|lte:20"
        ]);
           $updateNote=Composer::where('code_mat',$request->code_mat)
           ->where('num_mat',$request->session()->get('id_etu'))
           ->update([
               "note"=>$request->note
           ]);
           return redirect(route('dashboard'));
      }else{
        return view('accueil');
      }
     }
     public function ajoutNote(){
      if (Session::has("id_etu")){
          $matieres= DB::table("Matieres")->get();
          return view('addnote',compact('matieres'));
            }else{
             return view('accueil');
      }
     }
     public function ajoutNote_m(Request $request){
      if (Session::has("id_etu")){
        $this->validate($request,
      [
        "note"=>"required|numeric|gte:0|lte:20",
       "matiere"=>"required"
      ]);
      
          $matieres= DB::table("Matieres")->get();
          $selectnote=DB::table('Etudiants')
          ->join('Composer','Etudiants.num_mat','=','Composer.num_mat')
          ->join('Matieres','Composer.code_mat','=','Matieres.code_mat')
          ->select('Matieres.code_mat','Composer.note','Etudiants.*')
          ->where('Matieres.code_mat','=',$request->matiere)
          ->where('Etudiants.num_mat','=',$request->session()->get('id_etu'))
          ->first();
          if($selectnote){
            Session::forget('addsucessfull');
            Session::flash("addechec","vous aviez de note dans cette matière");
            return view('addnote',compact('matieres'));

          }else{

            Composer::create([
              "code_mat"=>$request->matiere,
              "num_mat"=>$request->session()->get('id_etu'),
              "note"=>$request->note]);
              Session::forget('addechec');
            Session::flash("addsucessfull","note bien ajouté");
            return redirect(route('dashboard'));
          } 
        }else{
             return view('accueil');
       }
     }
     public function profile(Request $request){
      if (Session::has("id_etu")){
        return view('profile');
      }else{
        return view('accueil');
      }
    }
    public function mProfile(){

    }
     public function logout(){
      Session::flush();
      return redirect(route('index'));
     }   
     public function downloadNote(Request $request){
      if (Session::has("id_etu")){
        $notes= DB::table('Etudiants')
        ->join('Composer','Etudiants.num_mat','=','Composer.num_mat')
        ->join('Matieres','Composer.code_mat','=','Matieres.code_mat')
        ->select('Matieres.*','Composer.note','Etudiants.*')
        ->where('Etudiants.num_mat','=',$request->session()->get('id_etu'))
        ->get();
         $pdf = PDF::loadView('PDF.note', compact("notes"));
         return $pdf->download('mes_notes.pdf'); 
      }else{
        return view('accueil');
      }
    }
     
    
}
