@extends('admin.dashboard')

@section('main_screen')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Create new animal</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!-- Show create animal alert -->
                  <div class="alert alert-info" role="alert">
                    You are about to create new animal.
                  </div>

                  <!-- Show create animal form -->
                  <div>
                    <form action="/admin/animal/create/process" method="post">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="animal_name">Animal Name</label>
                        <input type="text" class="form-control" id="animal_name" name="animal_name" placeholder="Animal Name">
                      </div>
                      <div class="form-group">
                        <label for="short_name">Short Name</label>
                        <input type="text" class="form-control" id="short_name" name="short_name" placeholder="Short Name">
                      </div>
                      <div class="form-group">
                        <label for="animal_code">Animal Code</label>
                        <input type="text" class="form-control" id="animal_code" name="animal_code" placeholder="Animal Code">
                      </div>
                      <div class="form-group">
                        <label for="animal_comment">Comment</label>
                        <textarea class="form-control" rows="3" id="animal_comment" name="animal_comment" placeholder="Animal Comment">
                        </textarea>
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
