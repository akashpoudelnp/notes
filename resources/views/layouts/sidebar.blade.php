<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        
        @php
            $urls= config('sidebar.urls');
        @endphp
       @for($i=0;$i<count($urls);$i++)
       <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{$urls[$i]['url']}}">
          <span data-feather="{{$urls[$i]['icon']}}"></span>
          {{$urls[$i]['name']}}
        </a>
      </li>
       @endfor
       
        
      </ul>

     
    </div>
  </nav>
