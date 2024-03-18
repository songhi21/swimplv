@if($errors->any())
<div class="alert alert-danger errortraphide" role="alert">
    {!! implode('', $errors->all('<div>:message</div>')) !!}
</div>
@elseif(session()->has('success'))
<div class="alert alert-success errortraphide" role="alert">
    {!! session()->get('success') !!}
</div>
@endif