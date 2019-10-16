@extends('layouts.vue')

@section('content')
<div id="app" class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <ul>
    </ul>
    <input id="input" type="text" class="form-control" />
</div>
@endsection

@section('extra-script')
<script>
let data = {
    persons: ["Nongnapat", "Panudda", "Sansanee"]
}

function addPerson() {
    if (!this.value) return
    
    data.persons.push(this.value);
    this.value = '';
    console.table(data.persons);
}

document.querySelector("#input").addEventListener("change", addPerson);
</script>
@endsection