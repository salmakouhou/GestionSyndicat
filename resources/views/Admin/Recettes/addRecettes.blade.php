@extends('master')
@section('contenu')



<div class="col-lg-12">
    <div class="card ">
      <div class="card-header bg-blue">
        <h5 class="text-white m-b-0">Ajouter une recette</h5>
      </div>
      <div class="card-body">
        <form action="{{route('recettes',['p1'=>$p1,'p2'=>$p2])}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Numero de pièce</label>
              <input class="form-control" name="numero_de_piece" placeholder="numero de piece" type="text" {{$p1=='edit'? "value=$recette->numero_de_piece":null}} >
              <span class="fa fa-barcode  form-control-feedback" ></span> </div>
          </div>
          <div class="col-md-6">
            <div class="form-group has-feedback">
              <label class="control-label">Nom de l'abonné</label>
                <select name="abonne_id" id="abonne_id" class="form-control">
                  @foreach ($abonnes as $abonne)
                      <option {{$p1=='edit'? $recette->abonne_id==$abonne->id ? 'selected':null :null}} value="{{$abonne->id}}">{{$abonne->nom}}</option>
                  @endforeach
                  {{-- <option value="AA" selected>ffff</option> --}}
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <label class="control-label ">Date</label>
              <input class="form-control" placeholder="dd/mm/yyyy" type="date" name="date_debut" {{$p1=='edit'? "value=$recette->date":null}}>
          
          </div>
          <div class="col-md-6">
            <label class="control-label ">Periode</label>
            <select name="periode" id="periode" class="form-control" {{$p1=='edit'? "value=$recette->periode":null}}>            
                  <option value="Janvier">Janvier</option>
                  <option value="Fevrier">Fevrier</option>
                  <option value="Mars">Mars</option>
                  <option value="Avril">Avril</option>
                  <option value="Mai">Mai</option>
                  <option value="Juin">Juin</option>
                  <option value="Juillet">Juillet</option>
                  <option value="Aout">Aout</option>
                  <option value="Septembre">Septembre</option>
                  <option value="Octobre">Octobre</option>
                  <option value="Novembre">Novembre</option>
                  <option value="Decembre">Decembre</option>
            </select>
            <br>
          </div>
          <div class="col-md-6">
            <label class="control-label ">Type de payement</label>
                <select name="categorie" id="categorie" class="form-control" {{$p1=='edit'? "value=$recette->type_de_payement":null}}>
                    <option value="villa">especes</option>
                    <option value="petit_appart">cheque</option>
                    <option value="moyen_appart">virement</option>
                  </select><br>
            </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
           </div>
        </form>
     
      </div>
    </div>
  </div>


@endsection