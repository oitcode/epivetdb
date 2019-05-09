@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Animals List</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!-- Show user list -->
                  <div class="table-responsive">
                    <table class="table table-condensed table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Shortname</th>
                          <th>Code</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($animals) > 0)
                          @foreach ($animals as $animal)
                            <tr>
                              <td>{{ $animal->name }}</td>
                              <td>{{ $animal->short_name }}</td>
                              <td>{{ $animal->code }}</td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                      <tfoot>
                      </tfoot>
                    </table>
                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
