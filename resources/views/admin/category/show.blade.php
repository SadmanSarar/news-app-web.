@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>Category</h3></div>
                    <div class="card-content">
                        <div class="pull-right" style="margin-right: 20px">
                            <a href="{{ url('/category') }}" title="Back">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"
                                                                          aria-hidden="true"></i> Back
                                </button>
                            </a>
                            <a href="{{ url('/category/' . $category->id . '/edit') }}" title="Edit Category">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                          aria-hidden="true"></i> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{ url('category' . '/' . $category->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Category"
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
                            <div> {{ $category->name }} </div>
                            <br>
                            <label> Description</label>
                            <div> {{ $category->description }} </div>
                            <br>
                            <label> Image</label>
                            <div>
                                <img src="@if(isset($category->image)) {{Illuminate\Support\Facades\Storage::url($category->image)}} @else {{asset('img/placeholder.jpg')}} @endif"
                                     alt="..."
                                >
                            </div>
                            <br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
