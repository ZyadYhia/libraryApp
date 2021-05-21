@if($errors->any())
<div class="alert w-50 text-danger">
    <ul class="list-unstyled">
        @foreach($errors->all() as $error)
        <li>* {{$error}} </li>
        @endforeach
    </ul>
</div>
@endif