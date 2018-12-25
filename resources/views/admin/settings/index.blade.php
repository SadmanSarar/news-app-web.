@extends('base')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <form action="{{route('settings.store')}}" method="post">
                        {!! csrf_field() !!}
                        <button class="btn btn-primary pull-right">Save Settings</button>
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th>
                                    <h6>Your Server Key</h6>
                                    <a>How to obtain your FCM Server Key?</a>
                                </th>
                                <td>
                                    <label>FCM Key</label>
                                    <input class="form-control" rows="3" name="app_fcm_key" id="app_fcm_key" required="" data-gramm="true" data-txt_gramm_id="0db6ce15-5350-1ce4-385e-7022efd9ea9d" data-gramm_id="0db6ce15-5350-1ce4-385e-7022efd9ea9d" spellcheck="false" data-gramm_editor="true" style="z-index: auto; position: relative; line-height: 20px; font-size: 14px; transition: none 0s ease 0s; !important;" value="{{isset($values['app_fcm_key']) ? $values['app_fcm_key'] : ''}}"/>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Your API Key</h6>
                                    <a>Where I have to put my API Key?</a>
                                </th>
                                <td>
                                    <label>Api key</label>
                                    <textarea class="form-control" rows="1" name="app_api_key" id="app_fcm_key" required="" data-gramm="true" data-txt_gramm_id="0db6ce15-5350-1ce4-385e-7022efd9ea9d" data-gramm_id="0db6ce15-5350-1ce4-385e-7022efd9ea9d" spellcheck="false" data-gramm_editor="true" style="z-index: auto; position: relative; line-height: 20px; font-size: 14px; transition: none 0s ease 0s; !important;">{{isset($values['app_api_key']) ? $values['app_api_key'] : ''}}</textarea>
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    <h6>Privacy policy</h6>
                                    <a>This privacy policy will be displayed in your android app</a>
                                </th>
                                <td>
                                    <label>Privacy Policy</label>
                                    <textarea class="form-control" rows="5" name="privacy_policy" type="textarea"
                                              id="privacy_policy">{{isset($values['privacy_policy']) ? $values['privacy_policy'] : ''}}
                                    </textarea>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection



@push('js')

    <script>
        ClassicEditor
            .create( document.querySelector( '#privacy_policy' ) )
            .catch( error => {
            console.error( error );
        });
    </script>
@endpush