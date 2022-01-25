<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Abonne;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

class AbonneController extends Controller
{
    public function listAbonnes() {
        if(session()->get('user')['nature']== 'abonne'){
        $data = [
            'abonnes' => Abonne::all()->where('nom','=',session()->get('user')['nom'])
        ];
        }else
        $data = [
            'abonnes' => Abonne::all()
        ];
        return view('Admin.Abonnes.listAbonnes')->with($data);
    }
    function addData(Request $req){

        $abonne= new Abonne;
        $abonne->reference=$req->reference;
        $abonne->nom=$req->nom;
        $abonne->email=$req->email;
        $abonne->tel=$req->tel;
        $abonne->date_debut=$req->date_debut;
        $abonne->categorie_id=$req->categorie_id;
        $abonne->mdp=$req->mdp;
        $abonne->save();
        return redirect('abonnes/add');
    }


    public function index($p1=null,$p2=null,$p3=null,Request $request){
        // return $request->session()->get('user');
        $view=null;
        $data=null;
        $data['p1']=$p1;
        $data['p2']=$p2;
        $data['p3']=$p3;
        if($request->isMethod('GET')){
            switch ($p1) {
                case 'add':
                    $data['categories']=Categorie::all();
                    $view='Admin.Abonnes.addAbonnes';
                    break;
                case 'edit':
                    $view='Admin.Abonnes.addAbonnes';
                    $data['categories']=Categorie::all();
                    $data['abonne']=Abonne::find($p2);
                    break;
                case 'delete':
                    break;
                case null:
                    if(session()->get('user')['nature']== 'abonne'){
                        $data = [
                            'abonnes' => Abonne::all()->where('nom','=',session()->get('user')['nom'])
                        ];
                        }else
                        $data = [
                            'abonnes' => Abonne::all()
                        ];
                    $view='Admin.Abonnes.listAbonnes';
                    break;
                default:
                    return redirect('abonnes');
                    break;
            }
            
            // return $data;

            return view($view)->with($data);
        }else if ($request->isMethod('POST')){
            switch ($p1) {
                case 'add':
                    $abonne= new Abonne;
                    $abonne->reference=$request->reference;
                    $abonne->nom=$request->nom;
                    $abonne->email=$request->email;
                    $abonne->tel=$request->tel;
                    $abonne->date_debut=$request->date_debut;
                    $abonne->categorie_id=$request->categorie_id;
                    $abonne->mdp=$request->mdp;
                    $request->session()->flash('success', 'l\'Abonné est bien ajouté!!');

                    $abonne->save();
                    return redirect('abonnes/add');
                    break;
                case 'edit':
                    $abonne= Abonne::find($p2);
                    // $abonne->reference=$request->reference;
                    $abonne->nom=$request->nom;
                    $abonne->email=$request->email;
                    $abonne->tel=$request->tel;
                    $abonne->date_debut=$request->date_debut;
                    $abonne->categorie_id=$request->categorie_id;
                    $abonne->mdp=$request->mdp;
                    $abonne->save();
                    return redirect('abonnes/add');
                    break;
                case 'delete':
                    $abonne= Abonne::find($p2);
                    $abonne->delete();
                    return redirect('abonnes/add');
                    break;
                case null:
                    if(session()->get('user')['nature']== 'abonne'){
                        $data = [
                            'abonnes' => Abonne::all()->where('nom','=',session()->get('user')['nom'])
                        ];
                        }else
                        $data = [
                            'abonnes' => Abonne::all()
                        ];
                    $view='Admin.Abonnes.listAbonnes';
                    break;
                default:
                    return redirect('abonnes');
                    break;
            }
            
            
            return view($view)->with($data);
        }
    }

}
