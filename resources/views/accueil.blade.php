@extends('layouts.header', ['title' =>'Acceuil'])
 @section('content')
    <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{route("index")}}" class="brand-logo"> Gesetu</a>
          <ul class="right hide-on-med-and-down">
            @if (Session::has('id_etu'))
            <li><a href="{{route("dashboard")}}">Tableau de bord</a></li>
            <li><a href="{{route("logout")}}">Déconnexion</a></li>
            @else
            <li><a href="{{route("connexion")}}">Se connecter</a></li>
            <li><a href="{{route("inscription")}}">S'inscrire</a></li>
            @endif
          </ul>
    
          <ul id="nav-mobile" class="sidenav">
            @if (Session::has('id_etu'))
            <li><a href="{{route("dashboard")}}">Tableau de bord</a></li>
            <li><a href="{{route("logout")}}">Déconnexion</a></li>
            @else
            <li><a href="{{route("connexion")}}">Se connecter</a></li>
            <li><a href="{{route("inscription")}}">S'inscrire</a></li>
            @endif
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
      </nav>
      <div class="section no-pad-bot" id="index-banner">
        <div class="container">
          <br><br>
          <h1 class="header center orange-text">Gestion des etudiant</h1>
          <div class="row center">
            <h5 class="header col s12 light"> Bienvenu sur la plateforme des étudiants </h5>
          </div>
          <div class="row center">
          <a href="{{route("inscription")}}"  class="btn-large waves-effect waves-light orange">Lancez vous</a>
          </div>
          <br><br>
    
        </div>
      </div>
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
    
  </div>
     
      <div class="container">
        <div class="section">
          <!--   Icon Section   -->
            <div class="col s12 m4">
              <div class="icon-block">
                <p class="light"></p>
              </div>
            </div>
          </div>
        </div>
        <br><br>
      </div>

<footer class="page-footer orange">
    
    <div class="container">
        <div class="section">
            <div class="col s12 m4">
              <div class="icon-block">
                <p class="light"> Tout part de votre connexion. vous pouvez : <br> Ajouter les notes <br> Telecharger la liste de vos notes </p>
              </div>
            </div>
          </div>
        </div>
        <br><br>
      </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="https://wa.me/22961720976?text=Hello+TOYERO+from+Gesetu">TOYERO</a>
      </div>
    </div>
  </footer>
  @endsection
  @extends('layouts.footer')