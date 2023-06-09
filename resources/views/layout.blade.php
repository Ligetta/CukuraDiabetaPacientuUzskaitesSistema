<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cukura Diabēta Sistēma</title>
    <!-- Css always use asset function! -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <!-- Font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
  </head>
  <body>
    <div id="wrapper">
      <!-- header -->
      @yield('header')

      <!-- sidebar -->
      <div class="sidebar">
        <span class="closeButton">&times;</span>
        <p class="brand-title"><a href="">Cukura Diabeta Sistēma</a></p>

        <div class="side-links">
          <ul>
            <li><a class="{{Request::routeIs('welcome.index') ? 'active' : ''}}" href="{{route('welcome.index')}}">Sākums</a></li>
            <li><a class="{{Request::routeIs('bloglist.index') ? 'active' : ''}}" href="{{route('bloglist.index')}}">Blogs</a></li>
            <li><a class="{{Request::routeIs('about') ? 'active' : ''}}" href="{{route('about')}}">Par mani</a></li>
            <li><a class="{{Request::routeIs('contact.index') ? 'active' : ''}}" href="{{route('contact.index')}}">Kontakti</a></li>

            @guest
              <li>
                <div class="text-end">
                  <a href="{{ route('login.perform') }}" >Pieslēgšanās</a>
                </div>
              </li>
              <li>
                <div class="text-end">
                  <a href="{{ route('register.perform') }}" >Reģistrācija sistēmā</a>
                </div>
              </li>
            @endguest

            @auth
            @if(auth()->user()->vaiirarsts === 'ja')
              
            <li>
              <div class="text-end">
                <a href="{{ route('arsts.index') }}" >Pacientu dienasgrāmatas</a>
              </div>
            </li>

            <li>
              <div class="text-end">
                <a href="{{ route('receptes.index') }}" >Receptes</a>
              </div>
            </li> 
            
            <li>
              <div class="text-end">
                <a href="{{ route('logout.perform') }}" style=" text-decoration: underline;">Izziet</a>
              </div>
            </li>
            @elseif(auth()->user()->vaiiradmins === 'ja')
            <li>
              <div class="text-end">
                <a href="{{ route('admin.index') }}">Piešķirt lomas</a>
              </div>
            </li>

            <li>
              <div class="text-end">
                <a href="{{ route('blog.index') }}">Blogu administrēšana</a>
              </div>
            </li>

            <li>
              <div class="text-end">
                <a href="{{ route('logout.perform') }}" style=" text-decoration: underline;">Izziet</a>
              </div>
            </li>
            @else
              <!-- Regular user -->
              <li>
                <div class="text-end">
                  <a href="{{ route('dienasgramata.index') }}" >Dienasgrāmata</a>
                </div>
              </li> 

              <li>
                <div class="text-end">
                  <a href="{{ route('kal.index') }}" >Kaulkulators</a>
                </div>
              </li> 

              <li>
                <div class="text-end">
                  <a href="{{ route('logout.perform') }}" style=" text-decoration: underline;">Izziet</a>
                </div>
              </li>  
            @endif
          @endauth
          </ul>
        </div>

        <!-- sidebar footer -->
        <footer class="sidebar-footer">
          <div>
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
          </div>

          <small>&copy 2023 Cukura Diabeta Sistēma</small>
        </footer>
      </div>
      <!-- Menu Button -->
      <div class="menuButton">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
      <!-- main -->
      @yield('main')
      @yield('content')

      <!-- Main footer -->
      @if(!isset($excludeFooter) || !$excludeFooter)
        <footer class="main-footer">
          <div>
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
          </div>
          <small>&copy 2023 Cukura Diabeta Sistēma</small>
        </footer>
      @endif

  </body>
</html>
