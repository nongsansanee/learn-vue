@extends('layouts.app')

@section('title', 'Uploads using JS')

@section('content')
<input
    type="file"
    name="files"
    accept=".xlsx, .xls, .csv"
    multiple
    class="d-none">
<div class="col-xs-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3">
    @csrf
    <button
        type="button"
        class="btn btn-info btn-block"
        onclick="document.querySelector('input[type=file]').click();">
        Browse files
    </button>
    <ul class="list-group my-4">
    </ul>
    <button
        id="btn-upload"
        type="button"
        class="btn btn-primary btn-block d-none">
        Upload
    </button>
</div>
@endsection

@section('extra-script')
<script>
    var filePassList;
    function filesSelected () {
        // console.table(this.files);
        filePassList = [];
        const ul = document.querySelector(".list-group");
        ul.innerHTML = ""
        Array.from(this.files).forEach((file) => {
            // text in <li>
            const label = document.createTextNode(file.name);
            
            // badge in <li>
            const badge = document.createElement("SPAN");
            badge.classList.add("badge", "badge-pill");
            badge.id = file.name;
            if (file.size < 1000000) {
                badge.innerHTML = "Pass";
                badge.classList.add("badge-primary");
                filePassList.push(file)
            } else {
                badge.innerHTML = "Not allow";
                badge.classList.add("badge-warning");
            }
            
            const li = document.createElement("LI");
            li.appendChild(label);
            li.appendChild(badge);
            li.classList.add("list-group-item", "d-flex", "justify-content-between", "align-items-center");
            ul.appendChild(li);
        });
        if (filePassList.length > 0) document.getElementById("btn-upload").classList.remove("d-none");
        else document.getElementById("btn-upload").classList.add("d-none");
    }
    document.querySelector("input[type=file]").addEventListener("change", filesSelected);

    function xhrOnload() {
        const badge = document.getElementById(this.responseText);
        badge.classList.remove("badge-primary");
        
        if (this.status == 200) {
            badge.innerHTML = "Done";
            badge.classList.add("badge-success");
        } else {
            badge.innerHTML = "Fail";
            badge.classList.add("badge-danger");
        }
    }

    function upload () {
        document.getElementById("btn-upload").classList.add("d-none");
        filePassList.forEach((file) => {
            const badge = document.getElementById(file.name);
            badge.innerHTML = "sending...";

            const formData = new FormData();
            formData.append("_token", document.querySelector("input[name=_token]").value);
            formData.append("file", file);

            const xhr = new XMLHttpRequest();
            xhr.addEventListener("load", function () {
                const badge = document.getElementById(file.name);
                badge.classList.remove("badge-primary");
                
                if (xhr.status == 200) {
                    badge.innerHTML = "Done";
                    badge.classList.add("badge-success");
                } else {
                    badge.innerHTML = "Fail";
                    badge.classList.add("badge-danger");
                }
            });
            xhr.open("POST", "/uploads", true);
            xhr.send(formData);
        });
    }
    document.getElementById("btn-upload").addEventListener("click", upload);
</script>
@endsection
