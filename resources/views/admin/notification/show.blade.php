@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Notification</h3></div>
                    <div class="card-content">
                        <div class="pull-right" style="margin-right: 20px">
                            <a href="{{ url('/notification') }}" title="Back">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                                                                          aria-hidden="true"></i> Back
                                </button>
                            </a>
                            <a href="{{ url('/notification/' . $notification->id . '/edit') }}"
                               title="Edit Notification">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                          aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{ url('notification' . '/' . $notification->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Notification"
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

                            <label> Title</label>
                            <div> {{ $notification->title }} </div>
                            <br>
                            <label> Message</label>
                            <div> {{ $notification->message }} </div>
                            <br>
                            <label> Url</label>
                            <div> {{ $notification->url }} </div>
                            <br>
                            <label> Type</label>
                            <div><strong>{{ str_replace('-',' ',strtoupper($notification->type)) }} </strong></div>
                            <br>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
