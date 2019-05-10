@extends('admin.dashboard')

@section('main_screen')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Address Input</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <!-- Show address input form -->
                  <div>
                    <form action="/admin/address/input/process" method="post">
                    {{ csrf_field() }}

                      <!-- State -->
                      <div class="form-group">
                        <label for="state_name">State</label>
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

                      <!-- Districts -->
                      <div class="form-group">
                        <label for="district_name">District</label>
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

                      <!-- Local Bodies -->
                      <div class="form-group">
                        <label for="local_body_name">Local Body</label>
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

                      <div class="form-group">
                        <label for="disease_comment">Comment</label>
                        <textarea class="form-control" rows="3" id="disease_comment" name="disease_comment" placeholder="Disease Comment">
                        </textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                  </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
