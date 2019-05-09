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
                      <li><a href="/admin/listusers">List users</a></li>
                      <li><a href="/register">Create new user</a></li>
                      <li><a href="/admin/changeupw">Change user password</a></li>
                    </ul>

                    <ul>
                      <li><a href="/admin/animal/create">Create new animal</a></li>
                      <li><a href="/admin/animal/list">List animals</a></li>
                    </ul> 

                    <ul> 
                      <li><a href="/admin/disease/create">Create new disease</a></li>
                      <li><a href="">Create new status</a></li>
                    </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
