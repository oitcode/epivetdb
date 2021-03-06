@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <strong>
                    Animals Disease Report Information - EDIT
                  </strong>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                      <!-- Show input form -->
                      <div>
                        <form class="form-horizontal" action="/admin/report/edit/process" method="post">
                        {{ csrf_field() }}
                          <!--
                            Disease report id
                            TODO: Can we do something rather than keeping it hidden?
                          -->
                          <input type="hidden" id="report_id" name="disease_report_id" value="{{ $report->disease_report_id }}">

                          <!-- Date -->
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="date">Date</label>
                            <div class="col-md-6">
                              <input type="date" class="form-control" id="date" name="date" placeholder="" value="{{ $report->date }}">
                            </div>
                          </div>

                            <!-- State -->
                            <div class="form-group">
                              <label for="state_name" class="col-md-4 control-label">State</label>
                              <div class="col-md-6">
                              <input type="text" class="form-control" id="state_name_text" name="state_name_text" placeholder="" value="{{
                              $report->local_body->district->state->name }}" readonly>
                              </div>
                            </div>

                            <!-- District -->
                            <div class="form-group">
                              <label for="state_name" class="col-md-4 control-label">District</label>
                              <div class="col-md-6">
                              <input type="text" class="form-control" id="district_name_text" name="district_name_text" placeholder="" value="{{
                              $report->local_body->district->name }}" readonly>
                              </div>
                            </div>

                            <!-- Local body -->
                            <div class="form-group">
                              <label for="state_name" class="col-md-4 control-label">State</label>
                              <div class="col-md-6">
                              <input type="text" class="form-control" id="local_body_name_text" name="local_body_name_text" placeholder="" value="{{
                              $report->local_body->name }}" readonly>
                              </div>
                            </div>

                            {{-- NOT USING THIS FOR NOW:::::NEED TO CHANGE JAVASCRIPT
                            <!-- Address -->
                            <!-- State -->
                            <div class="form-group">
                              <label for="state_name" class="col-md-4 control-label">State</label>
                              <div class="col-md-6">
                                <select class="form-control" id="state_name" name="state_name" value="">
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

                            <!-- Districts -->
                            <div class="form-group">
                              <label for="district_name" class="col-md-4 control-label">District</label>
                              <div class="col-md-6">
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

                            <!-- Local Bodies -->
                            <div class="form-group">
                              <label for="local_body_name" class="col-md-4 control-label">Local Body</label>
                              <div class="col-md-6">
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
                            --}}

                          <!-- Disease -->
                          <div class="form-group">
                            <label for="disease_id" class="col-md-4 control-label">Disease</label>
                            <div class="col-md-6">
                              <select class="form-control" id="disease_id" name="disease_id">
                                <option value="">
                                  --
                                </option>
                                @foreach ($diseases as $disease)
                                  <option value="{{ $disease->disease_id }}"
                                    @if ($report->disease->name == $disease->name)
                                      selected
                                    @endif
                                  >
                                    {{ $disease->name }}
                                    ({{ $disease->code }})
                                  </option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <!-- Species -->
                          <div class="form-group">
                            <label for="animal_id" class="col-md-4 control-label">Species</label>
                            <div class="col-md-6">
                              <select class="form-control" id="animal_id" name="animal_id">
                                <option value="">
                                  --
                                </option>
                                @foreach ($animals as $animal)
                                  <option value="{{ $animal->animal_id }}"
                                    @if ($report->animal->name == $animal->name)
                                      selected
                                    @endif
                                  >
                                    {{ $animal->name }}
                                    ({{ $animal->code }})
                                  </option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <!-- Num of outbreaks -->
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="num_of_outbreaks">Number of outbreaks</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="num_of_outbreaks" name="num_of_outbreaks" placeholder="" value="{{ $report->num_of_outbreaks }}">
                            </div>
                          </div>

                          <!-- Num of susceptible -->
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="num_of_susceptible">Number of susceptible</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="num_of_susceptible" name="num_of_susceptible" placeholder="" value="{{ $report->num_of_susceptible }}">
                            </div>
                          </div>

                          <!-- Num of affected -->
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="num_of_affected">Number of affected</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="num_of_affected" name="num_of_affected" placeholder="" value="{{ $report->num_of_affected }}">
                            </div>
                          </div>

                          <!-- Num of dead -->
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="num_of_dead">Number of dead</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="num_of_dead" name="num_of_dead" placeholder="" value="{{ $report->num_of_dead }}">
                            </div>
                          </div>

                          <!-- Num of vaccinated -->
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="num_of_vaccinated">Number of vaccinated</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="num_of_vaccinated" name="num_of_vaccinated" placeholder="" value="{{ $report->num_of_vaccinated }}">
                            </div>
                          </div>

                          <!-- Num of treated -->
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="num_of_treated">Number of treated</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="num_of_treated" name="num_of_treated" placeholder="" value="{{ $report->num_of_treated }}">
                            </div>
                          </div>

                          <!-- Reg Vacc -->
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="reg_vacc">Reg Vacc</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="reg_vacc" name="reg_vacc" placeholder="" value="{{ $report->reg_vacc }}">
                            </div>
                          </div>

                          <!-- Outbreak Res Vacc -->
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="outbreak_res_vacc">Outbreak Res Vacc</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="outbreak_res_vacc" name="outbreak_res_vacc" placeholder="" value="{{ $report->outbreak_res_vacc }}">
                            </div>
                          </div>

                          <!-- Destroyed -->
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="destroyed">Destroyed</label>
                            <div class="col-md-6">
                              <input type="text" class="form-control" id="destroyed" name="destroyed" placeholder="" value="{{ $report->destroyed }}">
                            </div>
                          </div>



                          <div class="form-group">
                            <label class="col-md-4 control-label" for="comment">Comment</label>
                            <div class="col-md-6">
                              <textarea class="form-control" rows="3" id="comment" name="comment" value="{{ $report->comment }}">{{ $report->comment }}</textarea>
                            </div>
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
