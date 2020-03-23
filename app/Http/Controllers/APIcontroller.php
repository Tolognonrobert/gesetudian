<?php

namespace App\Http\Controllers;
use App\Personne;
use App\Matieres;
use App\Composer;
use App\Etudiants;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class APIcontroller extends Controller
{
   public function readPersonne(){
       $Personnes=Personne::all();
        return response()->json($Personnes,200);
       }
       public function insertPersonne(Request $request){
        $this->validate($request,
        [
          "address"=>"required|min:2",
          "streetName"=>"required|min:2",
          'state'=>"required|min:2",
         'phoneNumber'=>"required|min:2"
        ]);
        
         $inscription=Personne::create(
                                 ["address"=>$request->address,
                                 "streetName"=>$request->streetName,
                                 "state"=>$request->state,
                                 "phoneNumber"=>$request->phoneNumber,
                                 ]
                               );
   
                               if($inscription){
                                return response()->json("inscription validé",200);
                               }else{
                                return response()->json("inscription échouée",404);
                               }
       }
       public function deletePersonne(Request $request){
        $usersexist=Personne::where('id',$request->id)->first();
        if($usersexist){
          $idcorect=Personne::where('id',$request->id)->delete();
          return response()->json("suppression réussir",200);
        }else{
            return response()->json("identifiant incorrect",404);
        }
       }
       public function updatePersonne(Request $request){
        $updatePersonne=Personne::where('id',$request->id)
        ->update([
          "address"=>$request->address,
          "streetName"=>$request->streetName,
          "state"=>$request->state,
          "phoneNumber"=>$request->phoneNumber
        ]);

        if($updatePersonne){
          return response()->json("modification réussir",200);
        }else{
            return response()->json("modification échouée",404);
        }
       }
}