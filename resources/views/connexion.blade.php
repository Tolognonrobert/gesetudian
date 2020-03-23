@extends('layouts.header', ['title' =>'Connexion'])
 @section('content')
    <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{route("index")}}" class="brand-logo"> Gesetu</a>
          <ul class="right hide-on-med-and-down">
          <li><a href="{{route("inscription")}}">S'inscrire</a></li>
          </ul>
          <ul id="nav-mobile" class="sidenav">
            <li><a href="{{route("connexion")}}">Se connecter</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
      </nav>
<div class="container">
    <h1 class="blue-text center">Connexion</h1>
      <div class="row">
         <!-- errors -->
         <div class="row">
          <p style=" text-align:center; color:red" id="errors_list">
              {{Session::get('erreur')}}
          </p>
      </div>
      <form class="col s12" action="{{route("verification_connexion")}}" method="POST" >
        {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s12">
              <input name="pseudo" placeholder="votre pseudo" id="first_name" type="text" class="validate">
              <label for="pseudo">pseudo</label>
            </div>
          </div>
         
      <div class="row">
        <div class="input-field col s6">
          <input name="password" placeholder="" id="first_name" type="password" class="validate">
          {!!$errors->first('password','<span style="color:red;" class="help-block">:message</span>')!!}

          <label for="password">Password</label>
        </div>
        <div class="input-field col s6">
          <input name="cpassword"  placeholder=""  id="last_name" type="password" class="validate">
          {!!$errors->first('cpassword','<span style="color:red;" class="help-block">:message</span>')!!}

          <label for="last_name">Confirmation password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
      <button class="btn blue waves-effect waves-light" type="submit" name="action">Soumettre 
      </button>
    </div>
  </div>
        </form>
      </div>
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
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">TOYERO</a>
      </div>
    </div>
  </footer>
  @endsection
  @extends('layouts.footer')
