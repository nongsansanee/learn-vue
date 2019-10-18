@extends('layouts.vue')

@section('content')
<div id="app" class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <input type="text" class="form-control" id="input" v-model="message" >
    <small id="input-sub">Input value is:@{{message}}</small>
</div>
@endsection

@section('extra-script')

<script>
var app =new Vue({
    el:"#app",
    data:{
        message:"hello Vue"
    }
});

/*
let data = {
    message: "Hello",
    subMessage: "Input value is: Hello"
}

document.querySelector("#input").value = data.message;
document.querySelector("#input-sub").innerHTML = data.subMessage;
*/
</script>
@endsection

