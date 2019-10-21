@extends('layouts.vue')

@section('content')
<div id="app" class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <label>Name:</label>
    <input type="text" v-model="newPerson">

    <label>Gender:</label>
    <input type="radio" name="gender"  v-model="gender" value="male">ชาย
    <input type="radio" name="gender" v-model="gender" value="female">หญิง
    <input type="button" value="OK" @click="addPerson" >

    <label for="">Persons:</label>
    <ul>
        <li v-for="person in persons">@{{person.name}}</li>
    </ul>

    <label for="">The Girls:</label>
    <ul>
            <li v-for="person in girlGroup">@{{person.name}}</li>
    </ul>

    <label for="">The Boys:</label>
    <ul>
            <li v-for="person in boyBand">@{{person.name}}</li>
    </ul>
</div>
@endsection

@section('extra-script')
<script>

var app = new Vue({
    el:"#app",
    data:{
        persons:[
            { name: "Nongnapat", isGirl: true },
            { name: "Panudda", isGirl: true },
            { name: "Sansanee", isGirl: true },
            { name: "Sophon", isGirl: false },
            { name: "Poonsap", isGirl: false }
           
        ],
        newPerson:null,
        gender:null
    },
    methods:{
            getGirls(){
                return this.persons.filter((person) => person.isGirl);
            },
            getBoys() {
                return this.persons.filter((person) => !person.isGirl);
            },
            addPerson(){
                // console.log(this.newPerson);
                // console.log(this.gender);
                if(!this.newPerson) return;
                this.persons.push({name: this.newPerson, isGirl: this.gender});
                this.persons = '';
            }
    },
    computed:{
            girlGroup(){
                return this.persons.filter((person) => person.isGirl);
            },
            boyBand() {
                return this.persons.filter((person) => !person.isGirl);
            }
    }
});
// let data = {
//     persons: [
//         { name: "Nongnapat", isGirl: true },
//         { name: "Panudda", isGirl: true },
//         { name: "Sansanee", isGirl: true },
//         { name: "Sophon", isGirl: false },
//         { name: "Poonsap", isGirl: false }
//     ]
// }

// function getGirls() {
//     return data.persons.filter((person) => person.isGirl);
// }

// function getBoys() {
//     return data.persons.filter((person) => !person.isGirl);
// }
</script>
@endsection
