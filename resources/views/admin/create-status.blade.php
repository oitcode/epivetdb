@extends('admin.dashboard')

@section('main_screen')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Create new status</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!-- Show create status alert -->
                  <div class="alert alert-info" role="alert">
                    You are about to create new status.
                  </div>

                  <!-- Show create status form -->
                  <div>
                    <form action="/admin/status/create/process" method="post">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label for="status_name">Status</label>
                        <input type="text" class="form-control" id="status_name" name="status_name" placeholder="Status">
                      </div>
                      <div class="form-group">
                        <label for="status_comment">Comment</label>
                        <textarea class="form-control" rows="3" id="status_comment" name="status_comment" placeholder="Status Comment">
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
