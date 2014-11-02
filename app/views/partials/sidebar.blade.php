        <div class="col-lg-4">
          <div class="well">
            <h4>Login</h4>
            {{ Form::open(array('url' => 'login')) }}
            @if($errors->any())
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </div>
            @endif
            <div class="form-group">
                {{ Form::label('email', 'Email Address') }}
                {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address')) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Login', array('class' => 'btn btn-success')) }}
                {{ HTML::link('/register', 'Register', array('class' => 'pull-right btn btn-info')) }}                
            </div>
            {{ Form::close() }}
          </div><!-- /well -->
          <div class="well">
            <h4>Widget Well. This could be anything.</h4>
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled">
                    <li>{{ HTML::link('http://www.kesweh.com','Kesweh') }}</li>
                    <li>{{ HTML::link('http://isamsung.es','iSamsung') }}</li>
                    <li>{{ HTML::link('http://www.imusicarock.com','Rock') }}</li>
                  </ul>
                </div>                
              </div>
          </div><!-- /well -->
          <div class="well">
            <h4>Another Side Widget Well</h4>
            <p>Bootstrap's default well's work great for side widgets! What is a widget anyways...?</p>
          </div><!-- /well -->
        </div>
      </div>