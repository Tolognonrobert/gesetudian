
 @extends('layouts.header', ['title' =>'Profile'])
 @section('content')
<div class="container">
    <h1 class="blue-text center">Profile en maintenance.  à bientôt</h1>
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
    