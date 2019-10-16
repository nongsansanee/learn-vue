@extends('layouts.vue')

@section('content')
<div id="app" class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <label for="">Persons:</label>
    <ul>
    </ul>

    <label for="">The Girls:</label>
    <ul>
    </ul>

    <label for="">The Boys:</label>
    <ul>
    </ul>
</div>
@endsection

@section('extra-script')
<script>
let data = {
    persons: [
        { name: "Nongnapat", isGirl: true },
        { name: "Panudda", isGirl: true },
        { name: "Sansanee", isGirl: true },
        { name: "Sophon", isGirl: false },
        { name: "Poonsap", isGirl: false }
    ]
}

function getGirls() {
    return data.persons.filter((person) => person.isGirl);
}

function getBoys() {
    return data.persons.filter((person) => !person.isGirl);
}
</script>
@endsection
