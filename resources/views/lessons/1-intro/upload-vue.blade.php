@extends('layouts.app')

@section('title', 'Uploads using VueJS')

@section('content')
<div id="app" class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    <input
        type="file"
        name="files"
        accept=".xlsx, .xls, .csv"
        multiple
        ref="inputFiles"
        class="d-none"
        @change="filesChanged">
    @csrf
    <button
        type="button"
        class="btn btn-info btn-block"
        @click="$refs.inputFiles.click()">
        Browse files
    </button>
    <ul class="list-group my-4">
        <li
            v-for="file in files"
            class="list-group-item d-flex justify-content-between align-items-center">
            @{{ file.content.name }}
            <span :class="'badge badge-pill badge-' + file.state.class">
                @{{ file.state.label }}
            </span>
        </li>
    </ul>
    <button
        id="btn-upload"
        type="button"
        class="btn btn-primary btn-block"
        v-show="btnUploadVisible"
        @click="upload">
        Upload
    </button>
</div>
@endsection

@section('extra-script')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
var app = new Vue({
    el: '#app',
    data: {
        files: [], // content + state
        btnUploadVisible: false
    },
    methods: {
        filesChanged () {
            this.files = [];
            Array.from(this.$refs.inputFiles.files).forEach((file) => {
                const state = { label: "Pass", class: "primary" };
                if (file.size > 1000000) {
                    state.label = "Not allow";
                    state.class = "warning";
                }
                this.files.push({
                    content: file,
                    state: state
                });
            });
            
            this.btnUploadVisible = this.files.filter(file => file.content.size <= 1000000).length > 0;
        },
        upload () {
            this.btnUploadVisible = false;
            this.files.forEach((file) => {
                if (file.content.size > 1000000) return;

                file.state.label = "Sending...";
                file.state.class = "secondary";
                const formData = new FormData();
                formData.append("_token", document.querySelector("input[name=_token]").value);
                formData.append("file", file.content);
                axios.post("/uploads", formData)
                     .then((response) => {
                        file.state.label = "Done";
                        file.state.class = "success";
                     })
                     .catch((error) => {
                        file.state.label = "Fail";
                        file.state.class = "danger";
                     });
            });
        }
    }
})
</script>
@endsection
