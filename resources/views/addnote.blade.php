@extends('layouts.header', ['title' =>'Insert'])
 @section('content')
<div class="container">
    <h1 class="blue-text center">Ajout de note</h1>
      <div class="row center">
         <!-- errors -->
         <div class="row">
          <p style=" text-align:center; color:red" id="errors_list">
              {{Session::get('addechec')}}
          </p>
      </div>
      <div class="row">
        <p style=" text-align:center; color:green" id="errors_list">
            {{Session::get('addsucessfull')}}
        </p>
    </div>
      <form class="col s12" action="{{route("ajoutNote_m")}}" method="POST" >
        {{ csrf_field() }}
          <div class="row">
            <div class="input-field col s6">
                <select name="matiere">
                  <option  disabled selected>Choisissez la matière</option>
                  @foreach ( $matieres as $matiere)
                   <option class="orange" value="{{$matiere->code_mat}}">{{$matiere->lib_mat}}</option>  
                  @endforeach
                </select> 
                </div>
        <div class="input-field col s6">
          <input name="note" placeholder="" id="first_name" type="text" class="validate">
          {!!$errors->first('note','<span style="color:red;" class="help-block">:message</span>')!!}
          <label for="note">votre note</label>
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
        <div class="footer-copyright">
          <div class="container">
          Made by <a class="orange-text text-lighten-3" href="https://wa.me/22961720976?text=Hello+TOYERO+from+Gesetu">TOYERO</a>
          </div>
        </div>
      </footer>
      @endsection
      @extends('layouts.footer')
    