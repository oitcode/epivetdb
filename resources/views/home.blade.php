@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h2 class="nb-smh2">
                    Welcome
                  </h2>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to National Veterinary Disease Reporting System!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
