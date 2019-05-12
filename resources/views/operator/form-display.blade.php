@extends('operator.dashboard')

@section('main_screen')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Form Input</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!-- Show input form -->
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
                      <button type="submit" class="btn btn-primary">Save</button>
                      <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                  </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
