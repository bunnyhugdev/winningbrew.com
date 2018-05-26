@extends('layouts.nonav')

@section('content')
<h1 class="h3 text-center">Log In</h1>
<div class="row justify-content-center">
    <div class="col-sm-6">
        <div class="text-center">
            <a href="{{ url('/login/google') }}"><img src="/images/btn_google_signin.png" width="191px" alt="Log in with Google"></a>
        </div>
        <div class="vertical-separator">OR</div>
        <form role="form" class="needs-validation" method="POST" action="{{ url('/login') }}" novalidate>
            @csrf
            <div class="form-group">
                <label for="email">E-Mail Address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Email is required.</div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
                <div class="invalid-feedback">Password is required.</div>
                <small class="form-text text-muted">
                    <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                </small>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-sign-in"></i> Log In
                </button>

            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
@endsection
