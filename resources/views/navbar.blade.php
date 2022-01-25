<aside class="main-sidebar"> 
    <!-- sidebar -->
    <div class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center"><img src="{{asset('dist/img/img1.jpg')}}" class="img-circle" alt="User Image"> </div>
        <div class="info">
          @if(Session::has('user'))
          <p>{{Session::get('user')['nom']}}</p>
          @else
          <p></p>
          @endif
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a> </div>
      </div>
      
      <!-- sidebar menu -->
      @if(Session::get('user')['nature']== 'admin')
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">GENERAL</li>
          <li class="treeview"> <a href="#"> <i class="icon-user"></i> <span>Abonnés</span> <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="{{route('abonnes')}}"><i class="fa fa-angle-right"></i> Liste des Abonnés</a></li>
              <!--<li><a href="{{route('abonnes',['p1'=>'add'])}}"><i class="fa fa-angle-right"></i> Ajouter un abonné</a></li>-->
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="icon-list"></i> <span>Catégories</span> <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i> </span> </a>
            <ul class="treeview-menu">
            <!-- <li><a href="{{route('categories',['p1'=>'add'])}}"><i class="fa fa-angle-right"></i> Ajouter une catégorie</a></li>
            --> <li><a href="{{route('categories')}}"><i class="fa fa-angle-right"></i> Liste des catégories</a></li>
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="icon-grid"></i> <span>Recettes</span> <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <!--<li><a href="{{route('recettes',['p1'=>'add'])}}"><i class="fa fa-angle-right"></i> Ajouter une recette</a></li>
              --><li><a href="{{route('recettes')}}"><i class="fa fa-angle-right"></i> Liste des recettes</a></li>
            </ul>
          </li>
          
          <li class="treeview"> <a href="#"> <i class="icon-chat"></i> <span>Reclamations</span> <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <!--<li><a href="{{route('reclamations',['p1'=>'add'])}}"><i class="fa fa-angle-right"></i> Ajouter une reclamation</a></li>
              --><li><a href="{{route('reclamations')}}"><i class="fa fa-angle-right"></i> Liste des reclamations</a></li>
            </ul>
          </li>
        
          <li class="header">Caisse</li>
          <li class="treeview"> <a href="#"><i class="icon-chart"></i> <span>Depenses</span> <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="{{route('depenses')}}"><i class="fa fa-angle-right"></i>Liste des types de depenses</a></li>
            <!-- <li><a href="{{route('depenses',['p1'=>'add'])}}"><i class="fa fa-angle-right"></i>Ajouter un type de depenses</a></li>
            --></ul>
          </li>
          <li class="treeview"> <a href="#"><i class="icon-wallet"></i> <span>Banques</span> <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="{{route('banques')}}"><i class="fa fa-angle-right"></i>Liste des banques</a></li>
              <!--<li><a href="{{route('banques',['p1'=>'add'])}}"><i class="fa fa-angle-right"></i>Ajouter une banque</a></li>
              --></ul>
          </li>
          
          
          
        </ul>
      @else
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">GENERAL</li>
          <li class="treeview"> <a href="#"> <i class="icon-user"></i> <span>Abonné</span> <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="{{route('abonnes')}}"><i class="fa fa-angle-right"></i> données de l'abonné</a></li>
              <!--<li><a href="{{route('abonnes',['p1'=>'add'])}}"><i class="fa fa-angle-right"></i> données de l'abonné</a></li>-->
            </ul>
          </li>
          <li class="treeview"> <a href="#"> <i class="icon-chat"></i> <span>Réclamations</span> <span class="pull-right-container"> <i class="fa fa-angle-right pull-right"></i> </span> </a>
            <ul class="treeview-menu">
              <li><a href="{{route('reclamations',['p1'=>'add'])}}"><i class="fa fa-angle-right"></i> Ajouter une reclamation</a></li>
              <!--<li><a href="{{route('reclamations')}}"><i class="fa fa-angle-right"></i> Liste des reclamations</a></li> -->
            </ul>
          </li>
        </ul>
      @endif
    </div>
    <!-- /.sidebar --> 
  </aside>
