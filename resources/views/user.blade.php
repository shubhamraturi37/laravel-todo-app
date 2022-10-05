@extends('layouts.app')

@section('title','hello world')
@section('content')
    <div>
    <div id="app">
        <login-component username="{{json_encode($user)}}"> </login-component>

    </div>
    </div>
@endsection
@section('drop-data')
    <div>no okay</div>
@endsection
<script>
    import LoginComponent from "../js/components/LoginComponent";
    export default {
        components: {LoginComponent}
    }
</script>
