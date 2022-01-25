@extends('master')
@section('contenu')
<div class="col-lg-12">
    <div class="card ">
      <div class="card-header bg-blue">
        <h5 class="text-white m-b-0">Ajouter une catégorie</h5>
      </div>
      <div class="card-body">
<form action="{{route('categories',['p1'=>$p1,'p2'=>$p2])}}" method="POST">
    @csrf
    
                        
    <fieldset>
        <div class="col-md-6">
            <label for="">Nom :</label>
            <input type="text" name="nom" placeholder="Entrer le nom"class="form-control" {{$p1=='edit'? "value=$categorie->nom":null}}><br>
        </div>
    <div class="col-md-6">
            <label for="">Mensualité :</label>
            <input type="text" name="mensualite" placeholder="Entrer la mensualité" class="form-control" {{$p1=='edit'? "value=$categorie->mensualite":null}}><br>
    </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        
    </fieldset>
    </div>
    </div>
    </div>
</form>
</div>
</div>
</div>
@endsection