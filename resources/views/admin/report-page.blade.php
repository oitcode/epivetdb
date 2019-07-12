@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <strong>Report Filter
                  </strong>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!-- Show user list -->
                  <form class="form" action="" method="post">
                  {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Start Date</label><br />
                          <input class="form-control" type="date" name="start_date">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>End Date</label><br />
                          <input class="form-control" type="date" name="end_date">
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>State</label><br />
                          <select class="form-control" id="state_name" name="state_name">
                            <option value="">
                              --
                            </option>
                            @foreach ($states as $state)
                              <option value="{{ $state->state_id }}">
                                {{ $state->name }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>District</label><br />
                          @foreach ($states as $state)
                            <select class="form-control" id="district_list_{{ $state->state_id }}" name="district_name">
                            <option value="">
                              --
                            </option>
                              @foreach ($state->districts as $district)
                                <option value="{{ $district->district_id}}">
                                  {{ $district->name }}
                                </option>
                              @endforeach
                            </select>
                          @endforeach
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Local Body</label><br />
                          @foreach ($districts as $district)
                            <select class="form-control" id="lb_list_{{ $district->district_id }}" name="local_body_name">
                              <option value="">
                                --
                              </option>
                              @foreach ($district->local_bodies as $local_body)
                                <option value="{{ $local_body->local_body_id }}">
                                  {{ $local_body->name }}
                                </option>
                              @endforeach
                            </select>
                          @endforeach
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Species</label><br />
                          <select class="form-control" id="animal_id" name="animal_id">
                            <option value="">
                              --
                            </option>
                            @foreach ($animals as $animal)
                              <option value="{{ $animal->animal_id }}">
                                {{ $animal->name }}
                                ({{ $animal->code }})
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Disease</label><br />
                          <select class="form-control" id="disease_id" name="disease_id">
                            <option value="">
                              --
                            </option>
                            @foreach ($diseases as $disease)
                              <option value="{{ $disease->disease_id }}">
                                {{ $disease->name }}
                                ({{ $disease->code }})
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Search</button>
                    <button type="submit" class="btn btn-primary pull-right">All Report</button>
                  </form>

                  <hr />
                  <!-- Show report list -->
                  <div class="table-responsive">
                    <table class="table table-condensed table-bordered table-striped">
                      <thead>
                        <tr class="success">
                          <th>Date</th>
                          <th>State</th>
                          <th>District</th>
                          <th>Local Body</th>
                          <th>Species</th>
                          <th>Disease</th>
                          <th>Num of outbreaks</th>
                          <th>Num of susceptible</th>
                          <th>Num of affected</th>
                          <th>Num of dead</th>
                          <th>Num of vaccinated</th>
                          <th>Num of treated</th>
                          <th>Reg Vacc</th>
                          <th>Outbreak Res Vacc</th>
                          <th>Destroyed</th>
                        </tr>
                      </thead>
                      <tbody>
                        @isset ($reports)
                          @if(count($reports) > 0)
                            @foreach ($reports as $report)
                              <tr>
                                <td>{{ $report->date }}</td>
                                <td>{{ $report->local_body->district->state->name }}</td>
                                <td>{{ $report->local_body->district->name }}</td>
                                <td>{{ $report->local_body->name }}</td>
                                <td>{{ $report->animal->name }}</td>
                                <td>{{ $report->disease->name }}</td>
                                <td>{{ $report->num_of_outbreaks }}</td>
                                <td>{{ $report->num_of_susceptible }}</td>
                                <td>{{ $report->num_of_affected }}</td>
                                <td>{{ $report->num_of_dead }}</td>
                                <td>{{ $report->num_of_vaccinated }}</td>
                                <td>{{ $report->num_of_treated }}</td>
                                <td>{{ $report->reg_vacc }}</td>
                                <td>{{ $report->outbreak_res_vacc }}</td>
                                <td>{{ $report->destroyed }}</td>
                              </tr>
                            @endforeach
                            <tr>
                              <td colspan="6">
                                <strong>
                                  Total
                                <strong>
                              </td>
                              <td>
                                <strong>
                                  {{ $total['totalNumOfOutbreaks' ]}}
                                </strong>
                              </td>
                              <td>
                                <strong>
                                  {{ $total['totalNumOfSusceptible' ]}}
                                </strong>
                              </td>
                              <td>
                                <strong>
                                  {{ $total['totalNumOfAffected' ]}}
                                </strong>
                              </td>
                              <td>
                                <strong>
                                  {{ $total['totalNumOfDead' ]}}
                                </strong>
                              </td>
                              <td>
                                <strong>
                                  {{ $total['totalNumOfVaccinated' ]}}
                                </strong>
                              </td>
                              <td>
                                <strong>
                                  {{ $total['totalNumOfTreated' ]}}
                                </strong>
                              </td>
                              <td>
                                <strong>
                                  {{ $total['totalRegVacc' ]}}
                                </strong>
                              </td>
                              <td>
                                <strong>
                                  {{ $total['totalOutbreakResVacc' ]}}
                                </strong>
                              </td>
                              <td>
                                <strong>
                                  {{ $total['totalDestroyed' ]}}
                                </strong>
                              </td>
                            </tr>
                          @endif
                        @endisset
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
