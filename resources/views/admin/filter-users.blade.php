@extends('admin.dashboard')

@section('main_screen')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Filter Users</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!-- Show filter users alert -->
                  <div class="alert alert-info" role="alert">
                    You are about to filter users.
                  </div>

                  <!-- Show filter users form -->
                  <div>
                    <form action="/admin/users/filter" method="post">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="state">State Name</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="State">
                      </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                  </div>

                  <!-- Display user list (if provided!) -->
                  @isset($users)
                    <ul>
                      @foreach ($users as $user)
                        <li>{{ $user->name }}</li>
                      @endforeach
                    </ul>
                  @endisset


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
