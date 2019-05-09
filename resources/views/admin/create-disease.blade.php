@extends('admin.dashboard')

@section('main_screen')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Create new disease</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!-- Show create disease alert -->
                  <div class="alert alert-info" role="alert">
                    You are about to create new disease.
                  </div>

                  <!-- Show create disease form -->
                  <div>
                    <form action="/admin/disease/create/process" method="post">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="disease_name">Disease Name</label>
                        <input type="text" class="form-control" id="disease_name" name="disease_name" placeholder="Disease Name">
                      </div>
                      <div class="form-group">
                        <label for="short_name">Short Name</label>
                        <input type="text" class="form-control" id="short_name" name="short_name" placeholder="Short Name">
                      </div>
                      <div class="form-group">
                        <label for="disease_code">Disease Code</label>
                        <input type="text" class="form-control" id="disease_code" name="disease_code" placeholder="Disease Code">
                      </div>
                      <div class="form-group">
                        <label for="disease_comment">Comment</label>
                        <textarea class="form-control" rows="3" id="disease_comment" name="disease_comment" placeholder="Disease Comment">
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
