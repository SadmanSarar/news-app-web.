@extends('base')




@section("content")

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="fas fa-money-bill-wave" style="font-size: 32px"></i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Payment</h4>
                        {!! $dataTable->table(['class' => 'table table-striped table-condensed']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .dt-button.btn {
            border: none !important;
            background-image: none;
            padding: 12px;
        }

        .dt-button:hover:not(.disabled) {
            background-image: none !important;
            background-color: #4caf50 !important;
            box-shadow: 0 14px 26px -12px rgba(76, 175, 80, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(76, 175, 80, 0.2) !important;
            border: none !important;
            padding: 12px;
        }
    </style>
@endpush

@push('js')

    {!! $dataTable->scripts() !!}

    <script>

        $(document).ready(function () {
            demo.initFormExtendedDatetimepickers();
        });

        $(document).on('submit', '#filter-form', function (e) {
            $('[data-feature~="filter"]').trigger('click');
            e.preventDefault();
        });

        $(document).on('click', '[data-feature~="filter"]', function (e) {
            let filter = $(e.target).data('filter'); // Target Filter Form
            let target = $(e.target).data('target'); // Target Datatable
            let table = $(target).DataTable();

            let data = $(filter).serialize();

            history.pushState({}, null, window.location.origin +
                window.location.pathname + '?' + data);
            table.draw();
        });


    </script>
@endpush