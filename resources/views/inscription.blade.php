
 @extends('layouts.header', ['title' =>'Inscription'])
 @section('content')
    <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{route("index")}}" class="brand-logo"> Gesetu</a>
          <ul class="right hide-on-med-and-down">
          <li><a href="{{route("connexion")}}">Se connecter</a></li>
          </ul>
          <ul id="nav-mobile" class="sidenav">
            <li><a href="{{route("connexion")}}">Se connecter</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
      </nav>

<div class="container">
    <h1 class="blue-text center">Inscription</h1>
      <div class="row">
      <form class="col s12" action="{{route("verification_inscription")}}" method="POST" enctype="multipart/form-data" >
        {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s6">
              <input name="nom" placeholder="votre nom" id="first_name" type="text" class="validate">
              {!!$errors->first('nom','<span style="color:red;" class="help-block">:message</span>')!!}
              <label for="first_name">Nom</label>
            </div>
            <div class="input-field col s6">
              <input name="prenom"  placeholder="votre Prenom"  id="last_name" type="text" class="validate">
              {!!$errors->first('prenom','<span style="color:red;" class="help-block">:message</span>')!!}

              <label for="last_name">Prenom</label>
            </div>
          </div>
         <div class="row">
          <div class="input-field col s6">
            <input name="pseudo" placeholder="votre pseudo" id="first_name" type="text" class="validate">
            {!!$errors->first('pseudo','<span style="color:red;" class="help-block">:message</span>')!!}

            <label for="first_name">Pseudo</label>
          </div>
          <div class="input-field col s6">
            <input name="email" id="last_name" placeholder="example@gmail.com" type="email" class="validate">
            {!!$errors->first('email','<span style="color:red;" class="help-block">:message</span>')!!}

            <label for="email">Email</label>
          </div>
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
            <select name="filliere">
              @foreach ( $fillieres as $filliere )
               <option class="orange" value="{{$filliere->code_fil}}">{{$filliere->lib_fil}}</option>  
              @endforeach
            </select> 
            </div>
            <div class="input-field col s6">
              <input name="profile" type="file" class="validate">
              {!!$errors->first('profile','<span style="color:red;" class="help-block">:message</span>')!!}
            <p>Votre photo</p>
              </div>
          </div>
          
          <div class="row">
            <div class="input-field col s12">
          <button class="btn blue waves-effect waves-light" type="submit">Soumettre 
          </button>
        </div>
        </div>
        <div class="row">
        <div class="input-field col s12">
        <a >vous avez un compte? <a  class="orange-text" href="{{route('connexion')}}">Se connecter</a> 
          </a>
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
