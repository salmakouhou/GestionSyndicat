@extends('master')

@section('contenu')
<div class="content-header">
    <div class="container-fluid">

        <h4 class="text-black">Liste des Recettes</h4>
        <p style="text-align-last: right"><a href="{{route('recettes',['p1'=>'add'])}}"  class="btn btn-link" >Ajouter une recette</a></p>


    </div>
</div>

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="table-responsive">
            <table class="table">
              <thead class="bg-blue">
                <tr>
                    <th>Numero de pièce</th>
                    <th>Nom de l'abonne</th>
                    <th>Date</th>
                    <th>Periode</th>
                    <th>Type de payement</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($recettes as $index => $recette)
                    <tr>
                        <td>{{ $recette->numero_de_piece}}</td>
                        <td>{{ $recette->abonne->nom}}</td>  
                        <td>{{ $recette->date}}</td>  
                        <td>{{ $recette->periode}}</td>  
                        <td>{{ $recette->type_de_payement}}</td>  
                        <td>
                            <a href="{{route('recettes',['p1'=>'edit','p2'=>$recette->id])}}">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a href="{{route('recettes',['p1'=>'delete','p2'=>$recette->id])}}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>   
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        
            
        </div>
        
        
    </div>
</div>

@endsection
@section('extra-js')
@endsection