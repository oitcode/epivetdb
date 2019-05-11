@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register new user</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <!-- Address -->
                        <!-- State -->
                        <div class="form-group">
                          <label for="state_name" class="col-md-4 control-label">State</label>
                          <div class="col-md-6">
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


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
