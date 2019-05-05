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

                  <!-- Show user list -->
                  <div>
                    <table class="table table-condensed table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>State</th>
                          <th>District</th>
                          <th>City</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($users) > 0)
                          @foreach ($users as $user)
                            <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->role }}</td>
                              <td>{{ $user->state }}</td>
                              <td>{{ $user->district }}</td>
                              <td>{{ $user->city }}</td>
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
