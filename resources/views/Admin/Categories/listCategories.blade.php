@extends('master')

@section('contenu')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
                
        <h4 class="text-black">Liste des Categories</h4>
        <p style="text-align-last: right"><a href="{{route('categories',['p1'=>'add'])}}"  class="btn btn-link" >Ajouter une catégorie</a></p>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="table-responsive">
            <table class="table">
              <thead class="bg-blue">
                <tr>
                    <th>Nom</th>
                    <th>Mensualité</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($categories as $index => $categorie)
                    <tr>
                        <td>{{ $categorie->nom}}</td>
                        <td>{{ $categorie->mensualite}}</td>   
                        <td>
                            <a href="{{route('categories',['p1'=>'edit','p2'=>$categorie->id])}}">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a href="{{route('categories',['p1'=>'delete','p2'=>$categorie->id])}}">
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