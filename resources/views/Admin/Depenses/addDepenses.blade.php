@extends('master')
@section('contenu')
<div class="col-lg-12">
    <div class="card ">
      <div class="card-header bg-blue">
        <h5 class="text-white m-b-0">Ajouter un Type de depenses</h5>
      </div>
      <div class="card-body">
<form action="{{route('depenses',['p1'=>$p1,'p2'=>$p2])}}" method="POST">
    @csrf
    
                        
    <fieldset>
        <div class="col-md-6">
            <label for="">Type de depenses :</label>
            <input type="text" name="type" placeholder="Entrer le type de depenses"class="form-control" {{$p1=='edit'? "value=$depense->type":null}}><br>
        </div>
    <div class="col-md-6">
            <label for="">Montant :</label>
            <input type="text" name="montant" placeholder="Entrer le montant" class="form-control" {{$p1=='edit'? "value=$depense->montant":null}}><br>
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