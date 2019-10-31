<header class="main-header">
    <a href="#" class="logo">      
      <span class="logo-mini"><b>Thermal</b></span>      
      <span class="logo-lg"><b>Thermal Monitoring</b></span>
    </a>    
    <nav class="navbar navbar-static-top" role="navigation">     
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <b><span class="hidden-xs" id="jam"></span></b>
            </a>
            
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <script>
    setInterval(function(){
      document.getElementById('jam').innerHTML = moment().locale('id').format('dddd, Do MMMM YYYY h:mm:ss');  
    },500)
    
  </script>