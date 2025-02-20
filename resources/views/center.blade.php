@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card text-center p-4" id="passwordCard" style="width: 18rem;">
        <h4 class="card-title">Random jelszó</h4>
        <p class="card-text" id="password">{{ Str::random(10) }}</p>
        <button class="btn btn-primary" id="Visibility">Jelszó elrejtése</button>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    let hidden = false;

    $('#passwordCard').on('click', function () {
        let newPass = Math.random().toString(36).slice(-10);
        $('#password').text(newPass);
        $(this).css('background-color', '#' + Math.floor(Math.random()*16777215).toString(16));
    });

    $('#Visibility').on('click', function () {
        let text = $('#password').text();
        if (!hidden) {
            $('#password').text('*'.repeat(text.length));
            $(this).text('Show Password');
        } else {
            $('#password').text(text);
            $(this).text('Hide Password');
        }
        hidden = !hidden;
    });
});
</script>
@endsection