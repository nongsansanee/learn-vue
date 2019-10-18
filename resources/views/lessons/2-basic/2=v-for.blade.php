@extends('layouts.vue')

@section('content')
<div id="app" class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <ul>
      {{-- <li v-for="person in persons">@{{person}} </li> --}}
      {{-- <li v-for="person in persons" v-text="person"> </li> --}}
      {{-- <li v-for="person in persons" v-html=" '<i>'+person+'</i>' "> </li> --}}
      {{-- <li v-for="person in persons" v-html="'nong'"> </li> --}}
      <li v-for="(person,indexx) in persons" v-text="`${indexx+1} => ${person}`"> </li>
    </ul>
    <input id="input" type="text" class="form-control" v-model="newPerson" />
</div>
@endsection

@section('extra-script')
<script>
var app = new Vue({
    el:"#app",
    data:{
        persons: ["Nongnapat", "Panudda", "Sansanee"],
        newPerson:""
    },
    mounted(){
        document.querySelector("#input").addEventListener("change", this.addPerson);
    },
    methods:{

        addPerson() {
            if (!this.newPerson) return
            
             this.persons.push(this.newPerson);
             this.newPerson = '';
            // console.table(data.persons);
        }
    }
});
// let data = {
//     persons: ["Nongnapat", "Panudda", "Sansanee"]
// }

// function addPerson() {
//     if (!this.value) return
    
//     data.persons.push(this.value);
//     this.value = '';
//     console.table(data.persons);
// }

//document.querySelector("#input").addEventListener("change", addPerson);
</script>
@endsection
