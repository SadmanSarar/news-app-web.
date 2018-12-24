@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>News</h3></div>
                    <div class="card-content">
                        <div class="pull-right" style="margin-right: 20px">
                            <a href="{{ url('/news') }}" title="Back">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                                                                          aria-hidden="true"></i> Back
                                </button>
                            </a>
                            <a href="{{ url('/news/' . $news->id . '/edit') }}" title="Edit News">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                          aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{ url('news' . '/' . $news->id) }}" accept-charset="UTF-8"
                                  style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete News"
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
                            <div> {{ $news->title }} </div>
                            <br>
                            @if(isset($news->category))
                                <label> Category</label>
                                <div>
                                    {{$news->category->name}}

                                </div>
                                <br>
                            @endif
                            <label> Body</label>
                            <div>{!! $news->body  !!} </div>
                            <br>
                            <label> Image</label>
                            <div>
                                <img src="{{Illuminate\Support\Facades\Storage::url($news->image)}}">
                            </div>
                            <br>

                            <label> Type</label>
                            <div><strong>{{ strtoupper($news->type) }} </strong></div>
                            <br>

                            <label> Published</label>
                            <div>
                                @if($news->published == "1")
                                    <strong class="text-success"> Published </strong> @else
                                    <strong class="text-warning"> Unpublished</strong> @endif
                            </div>
                            <br>
                            @if($news->published == "1" && isset($news->published_at))
                                <label> Published At</label>
                                <div>
                                    {{\Carbon\Carbon::parse($news->published_at)->toDayDateTimeString()}}

                                </div>
                                <br>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
