<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($category->name) ? $category->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($category->description) ? $category->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">

    <div class="fileinput fileinput-new text-center" data-provides="fileinput">

        <div class="fileinput-new thumbnail">
            <img src="@if(isset($category->image)) {{Illuminate\Support\Facades\Storage::url($category->image)}} @else {{asset('img/placeholder.jpg')}} @endif" alt="...">
        </div>
        <div class="fileinput-preview fileinput-exists thumbnail"></div>
        <div>
        <span class="btn btn-rose btn-round btn-file">
            <span class="fileinput-new">Select image</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="image" id="image" value="{{ isset($category->image) ? $category->image : ''}}"/>
        </span>
            <a href="" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
                        class="fa fa-times"></i> Remove</a>
            {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
