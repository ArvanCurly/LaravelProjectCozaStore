@extends('backend.templato')
@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création d'une catégorie</p>
        </header>
        <div class="card-content">
            <div class="content">

                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="field">
                        <label class="label">Nom de la catégorie</label>
                        <div class="control">
                            <input class="input @error('name') is-danger @enderror" id="name"type="text" name="name" value="{{ old('name') }}" placeholder="Nom de la catégorie">
                        </div>
                        @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div  style="margin-bottom:20px;">
                        <label class="label"> Selectionner une ou plusieurs images</label>
                            <input name="files[]" type="file" multiple />

                    </div>



                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-link" id="submit-all">Envoyer</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
    {{-- <script>

    Dropzone.options.myDropzone = {
        url : "{{route('categories.store')}}",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 10000,
            acceptedFiles: ".png, .jpg, .jpeg",

            init: function () {

                var submitButton = document.querySelector("#submit-all");
                 wrapperThis = this;

                submitButton.addEventListener("click", function () {
                    wrapperThis.processQueue();
                });

                //Button delete for every file

                this.on("addedfile", function (file) {

                    // Create the remove button
                    var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Effacer le fichier</button>");

                    // Listen to the click event
                    removeButton.addEventListener("click", function (e) {
                        // Make sure the button click doesn't submit the form:
                        e.preventDefault();
                        e.stopPropagation();

                        // Remove the file preview.
                        wrapperThis.removeFile(file);
                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                });

                this.on("complete", function(){
                    if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                    {
                        var _this =this;
                        _this.removeallFiles();
                    }
                });

                this.on('sendingmultiple', function (data, xhr, formData) {
                    formData.append("file", $("#file").val());
                });
            }
        };

    </script> --}}


@endsection
