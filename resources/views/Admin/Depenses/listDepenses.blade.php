@extends('master')

@section('contenu')
<div class="content-header">
    <div class="container-fluid">

        <h4 class="text-black">Liste des types de depenses</h4>
        <p style="text-align-last: right"><a href="{{route('depenses',['p1'=>'add'])}}"  class="btn btn-link" >Ajouter un type de depenses</a></p>

                
    </div>
</div>

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="table-responsive">
            <table class="table">
              <thead class="bg-blue">
                <tr>
                    <th>Type de depenses</th>
                    <th>Montant</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($depenses as $index => $depense)
                    <tr>
                        <td>{{ $depense->type}}</td>
                        <td>{{ $depense->montant}}</td>   
                        <td>
                            <a href="{{route('depenses',['p1'=>'edit','p2'=>$depense->id])}}">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a href="{{route('depenses',['p1'=>'delete','p2'=>$depense->id])}}">
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