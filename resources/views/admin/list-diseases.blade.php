@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Diseases List</div>

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
                        @if(count($diseases) > 0)
                          @foreach ($diseases as $disease)
                            <tr>
                              <td>{{ $disease->name }}</td>
                              <td>{{ $disease->short_name }}</td>
                              <td>{{ $disease->code }}</td>
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
