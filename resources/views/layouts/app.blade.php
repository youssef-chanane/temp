<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>Temperature</title>

  <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="noindex, nofollow">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Icons -->
  <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
  <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

  <!-- Fonts and Styles -->
  @yield('css_before')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" id="css-main" href="{{ mix('/css/oneui.css') }}">

  <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/amethyst.css') }}"> -->
  @yield('css_after')

  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
  </script>
</head>

<body>
  <!-- Page Container -->
  <!--
    Available classes for #page-container:

    GENERIC

      'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                  - Theme helper buttons [data-toggle="theme"],
                                                  - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                  - ..and/or One.layout('dark_mode_[on/off/toggle]')

    SIDEBAR & SIDE OVERLAY

      'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
      'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
      'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
      'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
      'sidebar-dark'                              Dark themed sidebar

      'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
      'side-overlay-o'                            Visible Side Overlay by default

      'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

      'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

      ''                                          Static Header if no class is added
      'page-header-fixed'                         Fixed Header

    HEADER STYLE

      ''                                          Light themed Header
      'page-header-dark'                          Dark themed Header

    MAIN CONTENT LAYOUT

      ''                                          Full width Main Content if no class is added
      'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
      'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

    DARK MODE

      'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
    -->
  <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
    <!-- Side Overlay-->
    <aside id="side-overlay" class="fs-sm">
      <!-- Side Header -->
      <div class="content-header border-bottom">
        <!-- User Avatar -->
        <a class="img-link me-1" href="javascript:void(0)">
          <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
        </a>
        <!-- END User Avatar -->

        <!-- User Info -->
        <div class="ms-2">
          <a class="text-dark fw-semibold fs-sm" href="javascript:void(0)">{{auth()->user()->name}}</a>
        </div>
        <!-- END User Info -->

        <!-- Close Side Overlay -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
          <i class="fa fa-fw fa-times"></i>
        </a>
        <!-- END Close Side Overlay -->
      </div>
      <!-- END Side Header -->

      <!-- Side Content -->
      <div class="content-side">
        <p>
          Content..
        </p>
      </div>
      <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    <nav id="sidebar" aria-label="Main Navigation">
      <!-- Side Header -->
      <div class="content-header">
        <!-- Logo -->
        <a class="font-semibold text-dual" href="/">
          <span class="smini-visible">
            <i class="fa fa-circle-notch text-primary"></i>
          </span>
          {{-- <span class="smini-hide fs-5 tracking-wider">One<span class="fw-normal">UI</span></span> --}}
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
          <!-- Dark Mode -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <a class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle" href="javascript:void(0)">
            <i class="far fa-moon"></i>
          </a>
          <!-- END Dark Mode -->

          <!-- Options -->
          <div class="dropdown d-inline-block ms-1">
            <a class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
              <i class="far fa-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end fs-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
              <!-- Color Themes -->
              <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
              <a class="dropdown-item d-flex align-items-center justify-content-between font-medium" data-toggle="theme" data-theme="default" href="#">
                <span>Default</span>
                <i class="fa fa-circle text-default"></i>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between font-medium" data-toggle="theme" data-theme="{{ mix('css/themes/amethyst.css') }}" href="#">
                <span>Amethyst</span>
                <i class="fa fa-circle text-amethyst"></i>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between font-medium" data-toggle="theme" data-theme="{{ mix('css/themes/city.css') }}" href="#">
                <span>City</span>
                <i class="fa fa-circle text-city"></i>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between font-medium" data-toggle="theme" data-theme="{{ mix('css/themes/flat.css') }}" href="#">
                <span>Flat</span>
                <i class="fa fa-circle text-flat"></i>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between font-medium" data-toggle="theme" data-theme="{{ mix('css/themes/modern.css') }}" href="#">
                <span>Modern</span>
                <i class="fa fa-circle text-modern"></i>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between font-medium" data-toggle="theme" data-theme="{{ mix('css/themes/smooth.css') }}" href="#">
                <span>Smooth</span>
                <i class="fa fa-circle text-smooth"></i>
              </a>
              <!-- END Color Themes -->

              <div class="dropdown-divider"></div>

              <!-- Sidebar Styles -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_light" href="javascript:void(0)">
                <span>Sidebar Light</span>
              </a>
              <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_dark" href="javascript:void(0)">
                <span>Sidebar Dark</span>
              </a>
              <!-- END Sidebar Styles -->

              <div class="dropdown-divider"></div>

              <!-- Header Styles -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_light" href="javascript:void(0)">
                <span>Header Light</span>
              </a>
              <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_dark" href="javascript:void(0)">
                <span>Header Dark</span>
              </a>
              <!-- END Header Styles -->
            </div>
          </div>
          <!-- END Options -->

          <!-- Close Sidebar, Visible only on mobile screens -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
            <i class="fa fa-fw fa-times"></i>
          </a>
          <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
      </div>
      <!-- END Side Header -->

      <!-- Sidebar Scrolling -->
      <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
          <ul class="nav-main">
            {{-- <li class="nav-main-item">
              <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="{{route('home')}}">
                <i class="nav-main-link-icon si si-cursor"></i>
                <span class="nav-main-link-name">Dashboard</span>
              </a>
            </li> --}}
            @if(auth()->user()->role=="super admin" || auth()->user()->role=="admin")
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('users.index') ? ' active' : '' }}" href="{{route('users.index')}}">
                  <i class="nav-main-link-icon si si-cursor"></i>
                  <span class="nav-main-link-name">Utilisateurs</span>
                </a>
            </li>
              <li class="nav-main-item">
                <a class="nav-main-link" href="{{route('apartements.index')}}">
                  <i class="nav-main-link-icon si si-bulb"></i>
                  <span class="nav-main-link-name">Exploitation</span>
                </a>


                @endif


                </ul>
              </li>
              @if(auth()->user()->role=="viewer")
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="{{route('apartements.show',auth()->user()->id)}}">
                      <i class="nav-main-link-icon si si-bulb"></i>
                      <span class="nav-main-link-name">Exploitation</span>
                    </a>
                  </li>
                @endif
            {{-- <li class="nav-main-item open">
                <form action="{{route('logout')}}" class="nav-main-link" method="post">
                 @csrf
                 <button class="btn">
                   <i class="nav-main-link-icon si si-logout"></i>
                   <span class="nav-main-link-name" style="color: #9faec1">Logout</span>
                 </button>
                </form>
            </li> --}}
          </ul>
        </div>
        <!-- END Side Navigation -->
      </div>
      <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Main Container -->
    <main id="main-container" class="">
                    {{-- success session --}}
                    @if(session()->has('warning'))
                    <div class="alert alert-danger">
                        {{session()->get('warning')}}
                    </div>
                @endif
      @yield('content')
    </main>
    <!-- END Main Container -->
<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
      <!-- Left Section -->
      <div class="d-flex align-items-center">
        <!-- Toggle Sidebar -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
          <i class="fa fa-fw fa-bars"></i>

        </button>
        <!-- END Toggle Sidebar -->

        <!-- Toggle Mini Sidebar -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
          <i class="fa fa-fw fa-ellipsis-v"></i>
          {{-- <i class="fa fa-2x fa-angles-left"></i> --}}
        </button>
        <!-- END Toggle Mini Sidebar -->




      </div>
      <!-- END Left Section -->

      <!-- Right Section -->
      <div class="d-flex align-items-center">
        <!-- User Dropdown -->
        <div class="dropdown d-inline-block ms-2">
          <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{-- <img class="rounded-circle" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 21px;"> --}}
            <span class="d-none d-sm-inline-block ms-2">{{auth()->user()->name}}</span>
            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
            <div class="p-3 text-center bg-body-light border-bottom rounded-top">
              {{-- <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/avatar10.jpg') }}" alt=""> --}}
              <p class="mt-2 mb-0 fw-medium">{{auth()->user()->name}}</p>
              {{-- <p class="mb-0 text-muted fs-sm fw-medium">Web Developer</p> --}}
            </div>
            {{-- <div class="p-2">
              <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span class="fs-sm fw-medium">Inbox</span>
                <span class="badge rounded-pill bg-primary ms-2">3</span>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span class="fs-sm fw-medium">Profile</span>
                <span class="badge rounded-pill bg-primary ms-2">1</span>
              </a>
              <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span class="fs-sm fw-medium">Settings</span>
              </a>
            </div> --}}
            <div role="separator" class="dropdown-divider m-0"></div>
            <div class="p-2">
              <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                <span class="fs-sm fw-medium">réglages</span>
              </a>
              <form class="dropdown-item d-flex align-items-center justify-content-between " action="{{route('logout')}}" method="post">
                @csrf
                <button class="btn btn-sm btn-alt-secondary d-flex align-items-center">Déconnecter</button>
              </form>
              {{-- <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{route('logout')}}">
              </a> --}}
            </div>
          </div>
        </div>
        <!-- END User Dropdown -->


      </div>
      <!-- END Right Section -->
    </div>
    <!-- END Header Content -->



    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-body-extra-light">
      <div class="content-header">
        <div class="w-100 text-center">
          <i class="fa fa-fw fa-circle-notch fa-spin"></i>
        </div>
      </div>
    </div>
    <!-- END Header Loader -->
  </header>
  <!-- END Header -->
    <!-- Footer -->
    {{-- <footer id="page-footer" class="bg-body-light">
      <div class="content py-3">
        <div class="row fs-sm">
          <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
            Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
          </div>
          <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
            <a class="fw-semibold" href="https://1.envato.market/AVD6j" target="_blank"></a> &copy; <span data-toggle="year-copy"></span>
          </div>
        </div>
      </div>
    </footer> --}}
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  <!-- OneUI Core JS -->
  <script src="{{ mix('js/oneui.app.js') }}"></script>

  <!-- Laravel Scaffolding JS -->
  <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->

  @yield('js_after')
</body>

</html>
