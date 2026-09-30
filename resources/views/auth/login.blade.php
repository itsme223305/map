@extends('layouts.app')
@section('head')
    <x-stylesheet path="css/admin-login.css" />
@endsection
@section('content')
    <script>
        $(document).ready(function () {
            let height = $(window).height()
            $('body').attr({style: 'min-height: '+height+'px;'});
        });
    </script>

    <div class="bg-color-login">
    <div class='box'>
      <div class='box-form'>
        <div class='box-login-tab'></div>
        <div class='box-login-title'>
          <div class='i i-login'></div><h2>ADMIN LOGIN</h2>
        </div>
        <div class='box-login'>
          <div class='fieldset-body' id='login_form'>
              <form method="post" action="{{route('admin.login.post')}}">
                  @csrf
                    <p class='field'>
                        <label for='user'>Email</label>
                        <input type='text' id='user' name='email' title='Username' />
                      @if($errors->has('login'))
                          <p class="error mt-1">{{$errors->first('login')}}</p>
                      @endif
                      @if($errors->has('email'))
                          <p class="error mt-1">{{$errors->first('email')}}</p>
                      @endif
                      <span id='valida' class='i i-warning'></span>
                     </p>
                      <p class='field'>
                        <label for='pass'>Lozinka</label>
                        <input type='password' id='pass' name='password' title='Password' />
                      @if($errors->has('password'))
                          <p class="error mt-1">{{$errors->first('password')}}</p>
                      @endif
                        <span id='valida' class='i i-close'></span>
                      </p>
                  <input type='submit' value='Log In' title='Log In' />
              </form>
          </div>
    </div>
  </div>
</div>

</div>
@endsection
