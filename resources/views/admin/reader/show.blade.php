@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3>Reader</h3></div>
                    <div class="card-content">
                        <div class="pull-right" style="margin-right: 20px">
                            <a href="{{ url('/reader') }}" title="Back">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                                                                          aria-hidden="true"></i> Back
                                </button>
                            </a>
                            <a href="{{ url('/reader/' . $reader->id . '/edit') }}" title="Edit Reader">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                          aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{ url('reader' . '/' . $reader->id) }}" accept-charset="UTF-8"
                                  style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Reader"
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
                            <div> {{ $reader->name }} </div>
                            <br>
                            <label> Email</label>
                            <div> {{ $reader->email }} </div>
                            <br>
                            <label> Image</label>
                            <div>
                                <img src="@if(isset($reader->image)) {{Illuminate\Support\Facades\Storage::url($reader->image)}} @else {{asset('img/placeholder.jpg')}} @endif"
                                     alt="..."
                                >
                            </div>
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
                            <form method="POST" action="{{ route('reader.update_pass' , $reader->id) }}"
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
