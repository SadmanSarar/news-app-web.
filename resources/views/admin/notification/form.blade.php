<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($notification->title) ? $notification->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
    <label for="message" class="control-label">{{ 'Message' }}</label>
    <input class="form-control" name="message" type="text" id="message" value="{{ isset($notification->message) ? $notification->message : ''}}" >
    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('url') ? 'has-error' : ''}}">
    <label for="url" class="control-label">{{ 'Url' }}</label>
    <input class="form-control" name="url" type="text" id="url" value="{{ isset($notification->url) ? $notification->url : ''}}" >
    {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <select name="type" class="form-control" id="type" >
    @foreach (json_decode('{"open-url": "Open Url", "open-app": "Open App"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($notification->type) && $notification->type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
