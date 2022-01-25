@extends('master')

@section('contenu')
    <!-- Content Header (Page header) -->
@if(Session::get('user')['nature']== 'abonne')
<div class="content-header">
    <div class="container-fluid">
        <h4 class="text-black">Données de l'abonné</h4>
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
                    <th>Réference</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Date de debut</th>
                    <th>Catégorie</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($abonnes as $index => $abonne)
                
                    <tr>
                        <td>{{ $abonne->reference}}</td>
                        <td>{{ $abonne->nom}}</td>
                        <td>{{ $abonne->email}}</td>
                        <td>{{ $abonne->tel}}</td>
                        <td>{{ $abonne->date_debut}}</td>
                        <td>{{ $abonne->categorie->nom}}</td>
                             
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        
                
            </div>
        </div>
        
    </div>
</div>
@else
<div class="content-header">
    <div class="container-fluid">
        <h4 class="text-black">Liste des Abonnés</h4>
        <p style="text-align-last: right"><a href="{{route('abonnes',['p1'=>'add'])}}"  class="btn btn-link" >Ajouter un abonné</a></p>
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
                    <th>Réference</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Date de debut</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($abonnes as $index => $abonne)
                    <tr>
                        <td>{{ $abonne->reference}}</td>
                        <td>{{ $abonne->nom}}</td>
                        <td>{{ $abonne->email}}</td>
                        <td>{{ $abonne->tel}}</td>
                        <td>{{ $abonne->date_debut}}</td>
                        <td>{{ $abonne->categorie->nom}}</td>
                        <td>
                            <a href="{{route('abonnes',['p1'=>'edit','p2'=>$abonne->id])}}">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a href="{{route('abonnes',['p1'=>'delete','p2'=>$abonne->id])}}">
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
</div>
@endif
@endsection
@section('extra-js')

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive:true,
            autoWidth: false,
        });
    });
</script>
@endsection