@extends('admin.dashboard')

@section('main_screen')
  <div class="row">

    <!-- Main info -->
    <div class="col-md-6">
      <div>
        <h4>Misc Information</h4>
        <hr />
        <h5>Recent Disease Activities</h5>
        <table class="table table-bordered table-condensed table-striped">
          <thead>
            <tr class="info">
              <th>Disease</th>
              <th>Area</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($recentReports as $recentReport)
              <tr>
                <td class="text-danger">
                  {{ $recentReport->disease->name }}
                </td>
                <td class="text-success">
                  {{ $recentReport->local_body->name }},
                  {{ $recentReport->local_body->district->name }},
                  State {{ $recentReport->local_body->district->state->name }}
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
          </tfoot>
        </table>
      </div>
    </div>

    <!-- Recent submissions column -->
    <div class="col-md-6">
      <h4>Recent Submissions</h4>
      <hr />
      <table class="table table-bordered table-condensed table-striped">
        <thead>
          <tr class="info">
            <th>Date</th>
            <th>Local Body</th>
            <th>Submitted by</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($recentReports as $recentReport)
            <tr>
              <td>
                {{ $recentReport->date }}
              </td>
              <td>
                <a href="">
                  {{ $recentReport->local_body->name }}
                </a>
              </td>
              <td>
                {{ $recentReport->creator->name }}
              </td>
              <td>
                <a href="">Delete</a>
                &nbsp;&nbsp;&nbsp;
                <a href="/admin/report/edit/{{ $recentReport->disease_report_id }}">Edit</a>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div>
  </div>
@endsection
