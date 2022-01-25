<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Reclamation;
use App\Models\Abonne;
use Illuminate\Support\Facades\DB;


class ReclamationController extends Controller
{
    public function listReclamations() {
        $data = [
            'recelamations' => Reclamation::all()
        ];
        // return $data;
        return view('Admin.Reclamations.listreclamations')->with($data);
        
    }

    function addData(Request $request){
        $reclamation= new Reclamation;
        $reclamation->abonne_id=$request->abonne_id;
        $reclamation->date_de_reclamation=$request->date_de_reclamation;
        $reclamation->date_de_traitement=$request->date_de_traitement;
        $reclamation->traite_par=$request->traite_par;
        $reclamation->description=$request->description;
        $reclamation->status=$request->status;
        $reclamation->save();
        return redirect('reclamations/add');
    }

    public function index($p1=null,$p2=null,$p3=null,Request $request){
        $view=null;
        $data=null;
        $data['p1']=$p1;
        $data['p2']=$p2;
        $data['p3']=$p3;
        if($request->isMethod('GET')){
            switch ($p1) {
                case 'add':
                    $view='Admin.Reclamations.addReclamations';
                    $data['abonnes']=Abonne::all();
                    break;
                case 'edit':
                    $view='Admin.Reclamations.addReclamations';
                    $data['abonnes']=Abonne::all();
                    $data['reclamation']=Reclamation::find($p2);
                    break;
                case 'delete':
                    break;
                case null:
                    $statut=$request->get('statut');
                    if($statut=='*'){
                        $statut='';
                    }
                    $data = ['reclamations' => Reclamation::where('status','like',$statut.'%')->get()];
                    $view='Admin.Reclamations.listReclamations';
                    break;
                default:
                    return redirect('reclamations');
                    break;
            }
            
            // return $data;

            return view($view)->with($data);
        }else if ($request->isMethod('POST')){
            if(session()->get('user')['nature']== 'abonne'){
            switch ($p1) {
                case 'add':
                    $reclamation= new Reclamation;
                    $reclamation->abonne_id=session()->get('user')['id'];
                    $reclamation->date_de_reclamation=$request->date_de_reclamation;
                    $reclamation->date_de_traitement=null;
                    $reclamation->traite_par=null;
                    $reclamation->description=$request->description;
                    $reclamation->status='Non Traité';
                    $reclamation->save();
                    return redirect('reclamations/add');
                    break;
                case 'edit':
                    // return $request->input();
                    $reclamation= Reclamation::find($p2);
                    // $reclamation->abonne_id=$request->abonne_id;
                    // $reclamation->date=$request->date;
                    // $reclamation->description=$request->description;
                    $reclamation->date_de_traitement=$request->date_de_traitement;

                    $reclamation->status=$request->status;
                    $reclamation->save();
                    return redirect('reclamations/add');
                    break;
                case 'delete':
                    $reclamation= Reclamation::find($p2);
                    $reclamation->delete();
                    return redirect('reclamations/add');
                    break;
                case null:
                    $data = [
                        'reclamations' => Reclamation::all()
                    ];
                    $view='Admin.Reclamations.listReclamations';
                    break;
                default:
                    return redirect('reclamations');
                    break;
            }
        }else{
        switch ($p1) {
            case 'add':
                $reclamation= new Reclamation;
                $reclamation->abonne_id=$request->abonne_id;
                $reclamation->date_de_reclamation=$request->date_de_reclamation;
                $reclamation->date_de_traitement=$request->date_de_traitement;
                $reclamation->traite_par=$request->traite_par;
                $reclamation->description=$request->description;
                $reclamation->status=$request->status;
                $reclamation->save();
                return redirect('reclamations/add');
                break;
            case 'edit':
                // return $request->input();
                $reclamation= Reclamation::find($p2);
                // $reclamation->abonne_id=$request->abonne_id;
                // $reclamation->date=$request->date;
                // $reclamation->description=$request->description;
                $reclamation->date_de_traitement=$request->date_de_traitement;

                $reclamation->status=$request->status;
                $reclamation->save();
                return redirect('reclamations/add');
                break;
            case 'delete':
                $reclamation= Reclamation::find($p2);
                $reclamation->delete();
                return redirect('reclamations/add');
                break;
            case null:
                $data = [
                    'reclamations' => Reclamation::all()
                ];
                $view='Admin.Reclamations.listReclamations';
                break;
            default:
                return redirect('reclamations');
                break;
        }
        }
            
            
            return view($view)->with($data);
        }
    }

    


}
