<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials/header')
  </head>

  <body>
    <div class="nav-header">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            {{ HTML::link('/admin', 'Admin', array('class' => 'navbar-brand')) }}
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
              <li>{{ link_to_route('timers.index', 'Timers') }}</li>
              <li>{{ HTML::link('logout', 'Logout') }}</li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
        @yield('content')
        </div>
        
        
      </div>
      
      @include('partials/footer')

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Make sure to add jQuery - download the most recent version at http://jquery.com/ -->
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')}}
    {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js')}}
    {{ HTML::script('/ckeditor/ckeditor.js')}}
  </body>
</html>