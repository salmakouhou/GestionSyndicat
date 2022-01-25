@extends('master')

@section('contenu')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="text-black">Liste des Reclamations</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mx-auto">
        <label for="reclamation_filter">Filter By Status &nbsp;</label>
            {{--<select id="select-action" name="action">
                <option value="*">*</option>
                <option value="Traité">Traité</option>
                <option value="Non traité">Non Traité</option>
                <option value="En cours">En cours</option>
            </select>--}}
            <a href="{{route('reclamations',['statut'=>'*'])}}" class="btn btn-link">All</a>
            <a href="{{route('reclamations',['statut'=>'Traité'])}}" class="btn btn-link">Traité</a>
            <a href="{{route('reclamations',['statut'=>'Non Traité'])}}" class="btn btn-link">Non Traité</a>
            <a href="{{route('reclamations',['statut'=>'En cours'])}}" class="btn btn-link">En cours</a>
        <div class="table-responsive">
            <table class="jsgrid-table table table-striped table-hover">
              <thead class="bg-blue">
                <tr class="jsgrid-header-row">
                    <th>Nom de l'abonné</th>
                    <th>Date de réclamation</th>
                    <th>Date de traitement</th>
                    <th>Traité par</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
                        
            <tbody>
                @foreach ($reclamations as $index => $reclamation)
                    <tr>
                        <td>{{ $reclamation->abonne->nom}}</td>  
                        <td>{{ $reclamation->date_de_reclamation}}</td>  
                        <td>{{ $reclamation->date_de_traitement}}</td> 
                        <td>{{ $reclamation->traite_par}}</td> 
                        <td>{{ $reclamation->description}}</td>  
                        <td>{{ $reclamation->status}}</td>  
                        <td>
                            <a href="{{route('reclamations',['p1'=>'edit','p2'=>$reclamation->id])}}">
                                <i class="fa fa-pencil-square-o"></i>
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
@section('javascript')

@endsection