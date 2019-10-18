@extends('layouts.vue')

@section('content')
<div id="app" class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <ul>
    <li v-for="person in persons">@{{person}}</li>
    </ul>
    <input  
        type="text" 
        class="form-control" 
        v-model="newPerson" 
        @change="addPerson"/>
</div>
@endsection

@section('extra-script')
<script>
    var app = new Vue({
        el : "#app",
        data:{
             persons: ["Nongnapat", "Panudda", "Sansanee"],
             newPerson:""
        },
        methods:{
            addPerson() {
              if(!this.newPerson) return;
                this.persons.push(this.newPerson);
                this.newPerson = '';
            
            }
        }
    });
// let data = {
//     persons: ["Nongnapat", "Panudda", "Sansanee"]
// }
</script>
@endsection
