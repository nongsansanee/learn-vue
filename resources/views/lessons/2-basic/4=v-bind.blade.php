@extends('layouts.vue')

@section('content')

<div id="app" class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <div class="form-group">
        <label for="age">Age :</label>
        <input 
            type="text" 
            :class="inputClass" 
            v-model="age" 
            :title="inputTitle" 
            @change="checkAge">
        <small class="text-secondary">Age ต้อง 38 ปีขึ้นไป</small>

    </div>
    <button 
        class="btn btn-primary" 
        :disabled="allow">
        Enter Site DekTape Concert
    </button>
</div>
@endsection

@section('extra-script')
<script>
    var app = new Vue({
        el:"#app",
        data:{
            age:null,
            allow:false,
            inputTitle:'',
            inputClass:"form-control"
        },
        methods:{
            checkAge(){
                // this.allow=(this.age >= 38);
                if(this.age>=38){
                     this.allow = true;
                     this.inputClass ="form-control allow";

                }else{
                    this.allow = false;
                     this.inputClass ="form-control not-allow"
                }
            }
        }
    });
// let data = {
//     age: null,
//     ageSubText: ""
// }    
</script>

@endsection
