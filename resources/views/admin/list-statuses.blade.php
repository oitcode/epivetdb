@extends('admin.dashboard')

@section('main_screen')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Statuses List</div>

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
                          <th>Status</th>
                          <th>Comment</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($statuses) > 0)
                          @foreach ($statuses as $status)
                            <tr>
                              <td class="success">{{ $status->name }}</td>
                              <td class="info">{{ $status->comment }}</td>
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
