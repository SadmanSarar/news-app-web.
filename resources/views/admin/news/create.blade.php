@extends('base')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="padding:16px">
                    <div class="card-header"><h3>Create New News</h3></div>
                    <div class="card-content">
                        <a href="{{ url('/news') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back
                            </button>
                        </a>
                        <br/>
                        <br/>

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/news') }}" accept-charset="UTF-8" class="form-horizontal"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.news.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
            console.error( error );
        });
    </script>
@endpush
