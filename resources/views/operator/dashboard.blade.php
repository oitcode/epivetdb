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
                      <strong>Dashboard</strong>
                    </button>
                    <!-- Form -->
                    <button type="button" class="btn btn-danger">
                      Form
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="/operator/form">Create new form</a>
                    </button>
                    <button type="button" class="btn btn-default text-left">
                      <a href="">List forms</a>
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
