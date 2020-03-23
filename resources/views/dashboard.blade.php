@extends('layouts.header', ['title' =>'Dashboard'])
 @section('content')
    <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{route("index")}}" class="brand-logo"> Gesetu</a>
          <ul class="right hide-on-med-and-down">
          <li><a href="{{route("index")}}">Acceuil</a></li>
          <li><a href="{{route("profile")}}">Profile</a></li>
          <li><a href="{{route("logout")}}">Déconnexion</a></li>
          </ul>
    
          <ul id="nav-mobile" class="sidenav">
            <li><a href="{{route("index")}}">Acceuil</a></li>
            <li><a href="{{route("profile")}}">Profile</a></li>
            <li><a href="{{route("logout")}}">Déconnexion</a></li>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
      </nav>
        <div class="container">
          <br><br>
          <h1 class="header center orange-text">Tableau de bord</h1>
          @if (count($notes)!=0)
          <table>
            <thead>
              <tr>
                  <th>Matières</th>
                  <th>Notes</th>
                  <th>Options</th>
              </tr>
            </thead>
        
            <tbody>
                @foreach ($notes as $note )
    <tr>
          <td >{{$note->lib_mat}}</td>
          <td>{{$note->note}}</td>
         <td ><a onclick="return confirm('Vouliez vous vraiment supprimer la note ?')" href="{{route('deleteNote')}}?id={{$note->code_mat}}"><i class="material-icons red-text">delete</i></a>
              <a onclick="return confirm('Vouliez vous vraiment modifier cette note?')" href="{{route('modifierNote')}}?id={{$note->code_mat}}"> <i class="material-icons blue-text">edit</i>
        </td>    
   </tr>
   @endforeach 
            </tbody>

<tfoot>
    <th>
    <div class="row">
      <div class=" col s6">
        <button class="btn white-text btn-small blue">
            <a style="color:white;text-decoration:none;"href="{{route('ajoutNote')}}">Ajouter une note</a>
        </button>
        </div>
        <div class="col s6">
          <a href="{{route('downloadNote')}}"><button class="btn blue btn-floating"><i class="material-icons">file_download</i></button></a>
        </div>
    </div>
</th>
</tfoot>
          </table>
          @else
          <table>
            <thead>
              <tr>
                  <th>Matiere</th>
                  <th>Note</th>
                  <th>Option</th>
              </tr>
            </thead>
            <tr>
                <td colspan="6" class="center">Vous n'aviez composer dans aucune matière</td>
            </tr>
        </tbody>
        <tfoot>
            <th>
                <div class="pagination row">
                    <button class="btn white-text btn-small blue">
                        <a style="color:white;text-decoration:none;"href="{{route('ajoutNote')}}">Ajouter une note</a>
                    </button>
                </div>
        </th>
        </tfoot>
        @endif
        </table>
<footer class="page-footer orange">
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="https://wa.me/22961720976?text=Hello+TOYERO+from+Gesetu">TOYERO</a>
      </div>
    </div>
  </footer>
  @endsection
  @extends('layouts.footer')
