@extends('layouts.admin_layout')
<style>
#container_content {
    background: white;
}
</style>
@section('content')
<div id="container_content">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="POST" class="" action="/pages" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-10">
                        <label for="category" class="col-md-12 col-form-label text-md-start">{{ __('Enter Category title') }}</label>
                        <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-10">
                        <label for="category" class="col-md-12 col-form-label text-md-start">{{ __('Upload Blog Media') }}</label>
                        <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" autofocus>
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-10 mt-1">
                        <label for="category" class="col-md-12 col-form-label text-md-start">{{ __('Enter Page Content') }}</label>
                        <textarea class="form-control @error('name') is-invalid @enderror" name="content" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            </textarea>
                    </div>

                    @if(!empty($meta_data) && count($meta_data) > 0)
                    <div class="col-md-10 mt-1">
                        <button id="addCategoryBtn" type="button" class="btn btn-primary m-2" style="width: 200px">
                            <i class="fa-solid fa-plus"></i>
                            Add Page Meta Data
                        </button>
                        <select id="labelSelect" class="form-control m-2">
                            <option value="" disabled selected>Select Meta Data</option>
                            @foreach ($meta_data as $key=>$item)
                            <option value="{{$item->meta_name}}#{{$item->id}}">{{$item->meta_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @else
                    <div class="col-md-10 mt-1">
                        <p>Run the seeder command to populate the MetaDataSeeder.</p>
                    </div>
                    @endif

                    <div id="categoryContainer" class="col-md-10 mt-1"></div>

                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById("addCategoryBtn").addEventListener("click", function() {
        var labelSelect = document.getElementById("labelSelect");
       // labelSelect.value;
        const parts = labelSelect.value.split("#");

         let selectedLabel=parts[0]; // "twitter:site"
        let formName=parts[1]
        var existingLabels = document.querySelectorAll("#categoryContainer label");

        // Check if the user selected a label and it's not already added
        if (selectedLabel && !labelAlreadyAdded(selectedLabel, existingLabels)) {
            // Create a new label element
            var labelElement = document.createElement("label");
            labelElement.className = "col-md-12 col-form-label text-md-start";
            labelElement.textContent = selectedLabel;

            // Create a new input element
            var inputElement = document.createElement("input");
            inputElement.type = "text";
            inputElement.className = "form-control";
            inputElement.name = formName; //set formName

            // Append the new elements to the container
            var container = document.getElementById("categoryContainer");
            container.appendChild(labelElement);
            container.appendChild(inputElement);
        }
    });

    // Helper function to check if a label is already added
    function labelAlreadyAdded(selectedLabel, existingLabels) {
        for (var i = 0; i < existingLabels.length; i++) {
            if (existingLabels[i].textContent.trim() === selectedLabel.trim()) {
                return true;
            }
        }
        return false;
    }
</script>
@endsection
