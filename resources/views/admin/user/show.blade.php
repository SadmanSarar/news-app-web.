@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3>User</h3></div>
                    <div class="card-content">
                        <div class="pull-right" style="margin-right: 20px">
                            <a href="{{ url('/user') }}" title="Back">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                                                                          aria-hidden="true"></i> Back
                                </button>
                            </a>
                            <a href="{{ url('/user/' . $user->id . '/edit') }}" title="Edit User">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                          aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{ url('user' . '/' . $user->id) }}" accept-charset="UTF-8"
                                  style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete User"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                                                 aria-hidden="true"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                        <br/>
                        <br/>
                        <br/>

                        <div class="col-md-12 table-responsive">
                            <label> Name</label>
                            <div> {{ $user->name }} </div>
                            <br>
                            <label> Email</label>
                            <div> {{ $user->email }} </div>
                            <br>
                            <label> Role</label>
                            <div> {{ $user->role }} </div>
                            <br>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3>Update Password</h3></div>
                    <div class="card-content">

                        <div class="col-md-12">
                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form method="POST" action="{{ route('user.update_pass' , $user->id) }}"
                                  accept-charset="UTF-8"
                                  class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                    <label for="password" class="control-label">{{ 'Password' }}</label>
                                    <input class="form-control" name="password" type="password" id="password">
                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                                    <label for="password_confirmation"
                                           class="control-label">{{ 'Confirm Password' }}</label>
                                    <input class="form-control" name="password_confirmation" type="password"
                                           id="password_confirmation">
                                    {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Update Password">
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
