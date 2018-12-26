@extends('base')

@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="fa fa-users"></i>
                </div>
                <div class="card-content">
                    <p class="category">Reader</p>
                    <h3 class="card-title">{{$reader_count}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">local_offer</i> Users from app
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="material-icons">category</i>
                </div>
                <div class="card-content">
                    <p class="category">Category</p>
                    <h3 class="card-title">{{$category_count}}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="fa fa-newspaper-o"></i>
                </div>
                <div class="card-content">
                    <p class="category">News</p>
                    <h3 class="card-title">{{$news_count}}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header" data-background-color="rose">
                    <i class="fa fa-bell"></i>
                </div>
                <div class="card-content">
                    <p class="category">Notification Template</p>
                    <h3 class="card-title">{{$notification_count}}</h3>
                </div>
            </div>
        </div>


    </div>

@endsection