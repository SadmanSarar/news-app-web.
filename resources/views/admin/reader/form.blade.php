<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name"
           value="{{ isset($reader->name) ? $reader->name : ''}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email"
           value="{{ isset($reader->email) ? $reader->email : ''}}">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">

    <div class="fileinput fileinput-new text-center" data-provides="fileinput">

        <div class="fileinput-new thumbnail">
            <img src="@if(isset($reader->image)) {{Illuminate\Support\Facades\Storage::url($reader->image)}} @else {{asset('img/placeholder.jpg')}} @endif"
                 alt="...">
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail"></div>
        <div>
        <span class="btn btn-rose btn-round btn-file">
            <span class="fileinput-new">Select image</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="image" id="image" value="{{ isset($reader->image) ? $reader->image : ''}}"/>
        </span>
            <a href="" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
                        class="fa fa-times"></i> Remove</a>
            {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
@if(!isset($reader))
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="control-label">{{ 'Password' }}</label>
        <input class="form-control" name="password" type="password" id="password">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
        <label for="password_confirmation" class="control-label">{{ 'Confirm Password' }}</label>
        <input class="form-control" name="password_confirmation" type="password" id="password_confirmation">
        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
    </div>
@endif

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
