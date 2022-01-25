@extends('master')
@section('contenu')

<div class="col-lg-12">
  @if(Session::get('user')['nature']== 'admin')
    <div class="card ">
      <div class="card-header bg-blue">
        <h5 class="text-white m-b-0">Traiter la réclamation</h5>
      </div>
      <div class="card-body">
        <form action="{{route('reclamations',['p1'=>$p1,'p2'=>$p2])}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Nom de l'abonné</label>
                <select name="abonne_id" id="abonne_id" class="form-control" disabled>
                  @foreach ($abonnes as $abonne)
                      <option {{$p1=='edit'? $reclamation->abonne_id==$abonne->id ? 'selected':null :null}} value="{{$abonne->id}}">{{$abonne->nom}}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-feedback">
            <label class="control-label ">Date de réclamation</label>
              <input class="form-control" placeholder="dd/mm/yyyy" disabled type="date" name="date_de_reclamation" {{$p1=='edit'? "value=$reclamation->date_de_reclamation":null}}>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-feedback">
            <label class="control-label ">Date de traitement</label>
              <input class="form-control" placeholder="dd/mm/yyyy" type="date" name="date_de_traitement" {{$p1=='edit'? "value=$reclamation->date_de_traitement":null}}>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Traité par</label>
              <input class="form-control" name="traite_par" placeholder="traité par" type="text" {{$p1=='edit'? "value=$reclamation->traite_par":null}} >
              <span class="fa fa-user form-control-feedback" ></span> </div>
          </div>
              <div class="col-md-6">
                <div class="form-group has-feedback">
                  <label class="control-label">Description</label>
                  <textarea disabled rows="6" class="form-control" name="description"  placeholder="description" type="text" {{$p1=='edit'? "value=$reclamation->description":null}} ></textarea>
                  <span class="fa fa-file-text-o  form-control-feedback" ></span> </div>
              </div>
          
          <div class="col-md-6">
            <label class="control-label ">Status</label>
            <select name="status" id="status" class="form-control" {{$p1=='edit'? "value=$reclamation->status":null}}>            
                  <option value="Traité">Traité</option>
                  <option value="Non traité">Non traité</option>
                  <option value="En cours">En cours</option>
            </select>
            <br>
          </div>
        </div>
          
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
           </div>
        </form>
     
      </div>
    @elseif(Session::get('user')['nature']== 'abonne')
    <div class="card ">
      <div class="card-header bg-blue">
        <h5 class="text-white m-b-0">Ajouter une reclamation</h5>
      </div>
      <div class="card-body">
        <form action="{{route('reclamations',['p1'=>$p1,'p2'=>$p2])}}" method="POST">
        @csrf
          <div class="col-md-6">
              <h3>Nom de l'abonné : {{Session::get('user')['nom']}}</h3>
          </div>
          <div class="col-md-6">
            <div class="form-group has-feedback">
            <label class="control-label ">Date de réclamation</label>
              <input class="form-control" placeholder="dd/mm/yyyy"  type="date" name="date_de_reclamation" {{$p1=='edit'? "value=$reclamation->date_de_reclamation":null}}>
            </div>
          </div>
          <div class="col-md">
            <div class="form-group has-feedback">
              <label class="control-label">Description</label>
              <textarea rows="6" class="form-control" name="description"  placeholder="description" type="text" {{$p1=='edit'? "value=$reclamation->description":null}} ></textarea>
              <span class="fa fa-file-text-o  form-control-feedback" ></span> </div>
          </div>
         
        
          
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
           </div>
        </form>
     
      </div>
    @endif
  </div>
  </div>


@endsection