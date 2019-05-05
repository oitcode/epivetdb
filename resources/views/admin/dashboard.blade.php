@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!-- Admin menu -->
                  <div>
                    <ul>
                      <li><a href="">Create new user</a></li>
                      <li><a href="">Create new animal</a></li>
                      <li><a href="">Create new disease</a></li>
                      <li><a href="">Create new status</a></li>
                    </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
