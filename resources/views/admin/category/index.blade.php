@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="fas fa-money-bill-wave" style="font-size: 32px"></i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Category</h4>
                        <div class="row">
                            <a style="margin-left: 20px" href="{{ url('/category/create') }}"
                               class="btn btn-success pull-left"
                               title="Add New News">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>

                            <form method="GET" action="{{ url('/category') }}" accept-charset="UTF-8"
                                  class="pull-right form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..."
                                           value="{{ request('search') }}">
                                    <span class="input-group-append">
                                                            <button class="btn btn-primary" type="submit"
                                                                    style="margin-right:10px;">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>
                                </div>
                            </form>

                        </div>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Total News</th>
                                    <th>Published News</th>
                                    <th>Unpublished News</th>
                                    <th class="text-center" align="center" style="text-align:center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($category as $item)
                                    <tr>
                                        <td>
                                            <img src="@if(isset($item->image)) {{Illuminate\Support\Facades\Storage::url($item->image)}} @else {{asset('img/placeholder.jpg')}} @endif"
                                                 alt="..."
                                                 style="width: 120px;height: 120px"
                                            >
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ isset($item->description) ? $item->description : 'N/A'}}</td>
                                        <td style="text-align: center">{{$item->news->count()}}</td>
                                        <td style="text-align: center">{{$item->publishedNews->count()}}</td>
                                        <td style="text-align: center">{{$item->unPublishedNews->count()}}</td>
                                        <td align="right">
                                            <a href="{{ url('/category/' . $item->id) }}" title="View Category">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                                                       aria-hidden="true"></i> View
                                                </button>
                                            </a>
                                            <a href="{{ url('/category/' . $item->id . '/edit') }}"
                                               title="Edit Category">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                          aria-hidden="true"></i> Edit
                                                </button>
                                            </a>

                                            <form method="POST" action="{{ url('/category' . '/' . $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Category"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $category->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
