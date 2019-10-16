@extends('layouts.vue')

@section('content')
<div id="app" class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <div class="form-group">
        <label for="age">Age :</label>
        <input type="text" class="form-control" id="age" title="">
        <small class="text-secondary">Age ต้อง 38 ปีขึ้นไป</small>

    </div>
    <button class="btn btn-primary" disabled>Enter Site DekTape Consert</button>
</div>
@endsection

@section('extra-script')
<script>
let data = {
    age: null,
    ageSubText: ""
}    
</script>

@endsection
