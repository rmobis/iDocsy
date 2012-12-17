<?php echo(Breadcrumb::create(array(
    'Documentation' => URL::to_route('home'),
    'Admin Login'
))); ?>

<h1>Admin Login</h1>
<br />
<div>
    {{ Form::open(URL::to_route('login')) }}
        <!-- check for login errors flash var -->
        @if (Session::has('login_errors'))
            {{ Alert::error("Username or password incorrect.") }}
        @endif

        @if (Session::has('backlink'))
            {{ Form::hidden('backlink', Session::get('backlink')) }}
        @endif

        <!-- username field -->
        <p>{{ Form::label('username', 'Username') }}</p>
        <p>{{ Form::text('username') }}</p>
        <!-- password field -->
        <p>{{ Form::label('password', 'Password') }}</p>
        <p>{{ Form::password('password') }}</p>
        <!-- submit button -->
        <p>{{ Form::submit('Login', array('class' => 'btn-large')) }}</p>
    {{ Form::close() }}
</div>