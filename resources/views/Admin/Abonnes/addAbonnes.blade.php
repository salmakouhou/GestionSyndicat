@extends('master')
@section('contenu')

<div class="col-lg-12">
    <div class="card ">
      <div class="card-header bg-blue">
        <h5 class="text-white m-b-0">Ajouter un abonné</h5>
      </div>
      <div class="card-body">
        <form action="{{route('abonnes',['p1'=>$p1,'p2'=>$p2])}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Référence</label>
              <input class="form-control" name="reference" placeholder="référence" type="text" {{$p1=='edit'? "value=$abonne->reference disabled":null}} >
              <span class="fa fa-barcode  form-control-feedback" ></span> </div>
          </div>
          <div class="col-md-6">
            <label class="control-label ">Date debut</label>
              <input class="form-control" placeholder="dd/mm/yyyy" type="date" name="date_debut" {{$p1=='edit'? "value=$abonne->date_debut":null}}>
          </div>
          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Nom</label>
              <input class="form-control" placeholder="nom" type="text" name="nom" {{$p1=='edit'? "value=$abonne->nom":null}}>
              <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
          </div>
          <div class="col-md-6">
            <label class="control-label ">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="form-control">
                  @foreach ($categories as $categorie)
                      <option {{$p1=='edit'? $abonne->categorie_id==$categorie->id ? 'selected':null :null}} value="{{$categorie->id}}">{{$categorie->nom}}</option>
                  @endforeach
                </select>
          </div>
          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">E-mail</label>
              <input class="form-control" placeholder="E-mail" type="text" name="email" {{$p1=='edit'? "value=$abonne->email":null}}>
              <span class="fa fa-envelope-o form-control-feedback" aria-hidden="true"></span> </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Contact Number</label>
              <input class="form-control" placeholder="Contact Number" type="text" name="tel" {{$p1=='edit'? "value=$abonne->tel":null}}>
              <span class="fa fa-phone form-control-feedback" aria-hidden="true"></span> </div>
          </div>
          
          
          <div class="col-md-6">
              <label class="control-label">Mot de passe</label>
              <input class="form-control" placeholder="Mot de passe" type="text" name="mdp" {{$p1=='edit'? "value=$abonne->mdp":null}}>
              <span class="fa fa-key form-control-feedback" aria-hidden="true"></span> 
          </div><br><br>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
           </div>
        </form>
        
      </div>
    </div>
  </div>


@endsection