@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change user password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!-- Show change password alert -->
                  <div class="alert alert-info" role="alert">
                    You are about to change user password.
                  </div>

                  <!-- Show change password form -->
                  <div>
                    <form action="" method="post">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="newpass">Password</label>
                        <input type="password" class="form-control" id="newpass" name="newpass" placeholder="New Password">
                      </div>
                      <div class="form-group">
                        <label for="newpassConfirm">Confirm Password</label>
                        <input type="password" class="form-control" id="newpassConfirm" name="newpassConf" placeholder="New Password Confirm">
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
