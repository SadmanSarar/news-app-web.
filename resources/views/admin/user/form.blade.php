<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($user->name) ? $user->name : ''}}">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email"
           value="{{ isset($user->email) ? $user->email : ''}}">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
@if($formMode != 'edit')
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
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ 'Role' }}</label>
    <select name="role" class="form-control" id="role">
        @foreach (json_decode('{"admin":"Admin","editor":"Editor"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($user->role) && $user->role == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
