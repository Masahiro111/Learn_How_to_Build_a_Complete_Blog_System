@props(['type' => 'text', 'name', 'placeholder', 'required' => 'true', 'value'])

<input
       value='{{ $value }}'
       type="{{ $type }}"
       id="{{ $name }}"
       name='{{ $name }}'
       class="form-control"
       placeholder="{{ $placeholder }}"
       {{ $required=='true' ? 'required' : '' }}>

@error($name)
<small class="text-danger">{{ $message }}</small>
@enderror