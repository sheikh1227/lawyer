{{-- BEGIN: Customizer --}}

<div class="customizer d-none d-md-block">

  <a class="customizer-toggle d-flex align-items-center justify-content-center" href="javascript:void(0);">
    <i class="spinner" data-feather="settings">
    </i>
  </a>

  <form action="{{ route('admin-setting-navbar') }}" method="POST" >
    @csrf
  <div class="customizer-content">
    <!-- Customizer header -->
    <div class="customizer-header px-2 pt-1 pb-0 position-relative">
      <h4 class="mb-0">Theme Customizer</h4>
      <p class="m-0">Customize & Preview in Real Time</p>

      <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
    </div>
    
    <hr />

    <!-- Styling & Text Direction -->
      <div class="customizer-styling-direction px-2">
        <p class="font-weight-bold">Skin</p>
        

        <div class="d-flex">
          <div class="custom-control custom-radio mr-1">
            <input type="radio" id="skinlight" name="skinradio" {{ (isset(Helper::getSettings()->skin) && Helper::getSettings()->skin == 'light' ) ? 'checked'  : ''  }}    value="light" class="custom-control-input layout-name"  data-layout="" />
            <label class="custom-control-label" for="skinlight">Light</label>
          </div>
          <div class="custom-control custom-radio mr-1">
            <input type="radio" id="skinbordered" name="skinradio" value="bordered" {{ (isset(Helper::getSettings()->skin) && Helper::getSettings()->skin == 'bordered') ? 'checked' :''  }} class="custom-control-input layout-name" data-layout="bordered-layout" />
            <label class="custom-control-label" for="skinbordered">Bordered</label>
          </div>
          <div class="custom-control custom-radio mr-1">
            <input type="radio" id="skindark" name="skinradio" value="dark" {{ (isset(Helper::getSettings()->skin) && Helper::getSettings()->skin == 'dark') ? 'checked' : '' }} class="custom-control-input layout-name" data-layout="dark-layout" />
            <label class="custom-control-label" for="skindark">Dark</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="skinsemidark" name="skinradio" value="semi-dark" {{ (isset(Helper::getSettings()->skin) && Helper::getSettings()->skin == 'semi-dark') ? 'checked' : ''  }} class="custom-control-input layout-name" data-layout="semi-dark-layout" />
            <label class="custom-control-label" for="skinsemidark">Semi Dark</label>
          </div>
  
        </div>
      </div>
  

    <hr />

    <!-- Menu -->
    <div class="customizer-menu px-2">
      <div id="customizer-menu-collapsible" class="d-flex">
        <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
        <div class="custom-control custom-control-primary custom-switch">
          <input type="checkbox" class="custom-control-input" name="collapsesidebarswitch" id="collapse-sidebar-switch" />
          <label class="custom-control-label" for="collapse-sidebar-switch"></label>
        </div>
      </div>
    </div>
    <hr />

    <!-- Layout Width -->
    <div class="customizer-footer px-2">
      <p class="font-weight-bold">Layout Width</p>
      <div class="d-flex">
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="layout-width-full" value="full" name="layoutWidth" class="custom-control-input" checked />
          <label class="custom-control-label" for="layout-width-full">Full Width</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="layout-width-boxed" value="boxed" name="layoutWidth" class="custom-control-input" />
          <label class="custom-control-label" for="layout-width-boxed">Boxed</label>
        </div>
      </div>
    </div>
    <hr />

    <!-- Navbar -->
    <div class="customizer-navbar px-2">
      <input type="hidden" value="" id="navColor" name="navColor">

      <div id="customizer-navbar-colors">
        <p class="font-weight-bold">Navbar Color</p>
        <ul class="list-inline unstyled-list">
          <li class="color-box bg-white border {{ (isset(Helper::getSettings()->navColor) && Helper::getSettings()->navColor == 'bg-white' ) ? 'selected'  : ''  }} " data-navbar-default="bg-white"> </li>
          <li class="color-box bg-primary {{ (isset(Helper::getSettings()->navColor) && Helper::getSettings()->navColor == 'bg-primary' ) ? 'selected'  : ''  }}" data-navbar-color="bg-primary"></li>
          <li class="color-box bg-secondary {{ (isset(Helper::getSettings()->navColor) && Helper::getSettings()->navColor == 'bg-secondary' ) ? 'selected'  : ''  }}" data-navbar-color="bg-secondary"></li>
          <li class="color-box bg-success {{ (isset(Helper::getSettings()->navColor) && Helper::getSettings()->navColor == 'bg-success' ) ? 'selected'  : ''  }}" data-navbar-color="bg-success"></li>
          <li class="color-box bg-danger {{ (isset(Helper::getSettings()->navColor) && Helper::getSettings()->navColor == 'bg-danger' ) ? 'selected'  : ''  }}" data-navbar-color="bg-danger"></li>
          <li class="color-box bg-info {{ (isset(Helper::getSettings()->navColor) && Helper::getSettings()->navColor == 'bg-info' ) ? 'selected'  : ''  }}" data-navbar-color="bg-info"></li>
          <li class="color-box bg-warning {{ (isset(Helper::getSettings()->navColor) && Helper::getSettings()->navColor == 'bg-warning' ) ? 'selected'  : ''  }}" data-navbar-color="bg-warning"></li>
          <li class="color-box bg-dark {{ (isset(Helper::getSettings()->navColor) && Helper::getSettings()->navColor == 'bg-dark' ) ? 'selected'  : ''  }}" data-navbar-color="bg-dark"></li>
        </ul>
      </div>

      <p class="navbar-type-text font-weight-bold">Navbar Type</p>
      <div class="d-flex">
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="nav-type-floating" {{ (isset(Helper::getSettings()->navType) && Helper::getSettings()->navType == 'floating' ) ? 'checked'  : ''  }} value="floating" name="navType" class="custom-control-input"  />
          <label class="custom-control-label" for="nav-type-floating">Floating</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="nav-type-sticky" {{ (isset(Helper::getSettings()->navType) && Helper::getSettings()->navType == 'sticky' ) ? 'checked'  : ''  }} value="sticky" name="navType" class="custom-control-input" />
          <label class="custom-control-label" for="nav-type-sticky">Sticky</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="nav-type-static" {{ (isset(Helper::getSettings()->navType) && Helper::getSettings()->navType == 'static' ) ? 'checked'  : ''  }} value="static" name="navType" class="custom-control-input" />
          <label class="custom-control-label" for="nav-type-static">Static</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="nav-type-hidden" {{ (isset(Helper::getSettings()->navType) && Helper::getSettings()->navType == 'hidden' ) ? 'checked'  : ''  }} value="hidden" name="navType" class="custom-control-input" />
          <label class="custom-control-label" for="nav-type-hidden">Hidden</label>
        </div>
      </div>
    </div>
    <hr />

    <!-- Footer -->
    <div class="customizer-footer px-2">
      <p class="font-weight-bold">Footer Type</p>
      <div class="d-flex">
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="footer-type-sticky" {{ (isset(Helper::getSettings()->footerType) && Helper::getSettings()->footerType == 'sticky' ) ? 'checked'  : ''  }} value="sticky" name="footerType" class="custom-control-input" />
          <label class="custom-control-label" for="footer-type-sticky">Sticky</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="footer-type-static" {{ (isset(Helper::getSettings()->footerType) && Helper::getSettings()->footerType == 'static' ) ? 'checked'  : ''  }} value="static" name="footerType" class="custom-control-input"  />
          <label class="custom-control-label" for="footer-type-static">Static</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="footer-type-hidden" {{ (isset(Helper::getSettings()->footerType) && Helper::getSettings()->footerType == 'hidden' ) ? 'checked'  : ''  }} value="hidden" name="footerType" class="custom-control-input" />
          <label class="custom-control-label" for="footer-type-hidden">Hidden</label>
        </div>

      </div>
      <div class="d-flex">
      
      <div class="mt-3">
        <button class="btn btn-primary" type="submit">Apply&Save</button>
      </div>
      </div>
    </div>
  </div>
</form>


</div>
{{-- End: Customizer --}}
