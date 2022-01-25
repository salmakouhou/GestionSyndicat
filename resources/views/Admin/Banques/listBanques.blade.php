@extends('master')

@section('contenu')
<div class="content-header">
    <div class="container-fluid">

        <h4 class="text-black">Liste des Banques</h4>
        <p style="text-align-last: right"><a href="{{route('banques',['p1'=>'add'])}}"  class="btn btn-link" >Ajouter une banque</a></p>


    </div>
</div>

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="table-responsive">
            <table class="table">
              <thead class="bg-blue">
                <tr>
                    <th>Nom</th>
                    <th>Numéro</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($banques as $index => $banque)
                    <tr>
                        <td>{{ $banque->nom}}</td>
                        <td>{{ $banque->numero}}</td>   
                        <td>
                            <a href="{{route('banques',['p1'=>'edit','p2'=>$banque->id])}}">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a href="{{route('banques',['p1'=>'delete','p2'=>$banque->id])}}">
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