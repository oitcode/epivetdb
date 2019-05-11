@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Any status message -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <div class="row">
        <!-- Admin Menu -->
        <div class="col-md-2 col-md-offset-0">
            <div class="">
                <div class="">
                  <!-- Admin dashboard menu -->
                  <div class="btn-group-vertical" role="group" aria-label="...">
                    <button type="button" class="btn btn-info">
                      <strong>Admin Dashboard</strong>
                    </button>
                    <!-- Animal -->
                    <button type="button" class="btn btn-danger">
                      Animal
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/admin/animal/create">Create new animal</a>
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/admin/animal/list">List animals</a>
                    </button>
                  
                    <!-- Disease -->
                    <button type="button" class="btn btn-warning">
                      Disease
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/admin/disease/create">Create new disease</a>
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/admin/disease/list">List diseases</a>
                    </button>
                  
                    <!-- Status -->
                    <button type="button" class="btn btn-warning">
                      Status
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/admin/status/create">Create new status</a>
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/admin/status/list">List statuses</a>
                    </button>

                    <!-- Users -->
                    <button type="button" class="btn btn-success">
                      Users
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/admin/listusers">List users</a>
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/register">Create new user</a>
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/admin/changeupw">Change user password</a>
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/admin/address/input">Address</a>
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/admin/users/filter">Filter users</a>
                    </button>
                  

                  </div>
                </div>

            </div>
        </div>

        <!-- Main screen -->
        <div class="col-md-8 col-md-offset-0">
          @yield('main_screen')
        </div>
    </div>
</div>
@endsection
