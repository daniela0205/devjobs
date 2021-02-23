@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha256-R45gjjgTM82XinRpA4xKOL00zJ2/ajOSjY3tvw5JaDM=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css" integrity="sha256-NkyhTCRnLQ7iMv7F3TQWjVq25kLnjhbKEVPqGJBcCUg=" crossorigin="anonymous" />
@endsection

@section('navigation')
    @include('ui.adminnav')
@endsection

@section('content')

<h1 class="text-2xl text-center mt-10">New Positions</h1>


    <form
        action="{{route('positions.store')}}"
        method="POST"
        class="max-w-lg mx-auto my-10"
        >
        @csrf

        <div class="mb-5">
            <label
                for="title"
                class="block text-gray-700 text-sm mb-2"
            >Title Position:</label>

            <input
                id="title"
                type="text"
                class="p-3 bg-gray-100 rounded form-input w-full  @error('title') is-invalid @enderror"
                name="title"
                placeholder="Title of position"
                value="{{ old('title') }}"
            >

            @error('title')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="category"
                class="block text-gray-700 text-sm mb-2"
            >Category:</label>

            <select
                id="category"
                class="block appearance-none w-full
                        border border-gray-200 text-gray-700 rounded leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                        w-full"
                name="category"
            >
                <option disabled selected>- Selecciona -</option>

              @foreach ($categories as $category)
                    <option
                        {{ old('category') == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}"
                    >
                        {{$category->name}}
                    </option>
                @endforeach
            </select>

            @error('category')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="experiencia"
                class="block text-gray-700 text-sm mb-2"
            >Experience:</label>

            <select
                id="experience"
                class="block appearance-none w-full
                        border border-gray-200 text-gray-700 rounded leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                        w-full"
                name="experience"
            >
                <option disabled selected>- Selecciona -</option>

                @foreach ($experiences as $experience)
                    <option
                        {{ old('experience') == $experience->id ? 'selected' : '' }}
                        value="{{ $experience->id }}"
                    >
                        {{$experience->name}}
                    </option>
                @endforeach
            </select>

            @error('experience')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="location"
                class="block text-gray-700 text-sm mb-2"
            >Location:</label>

            <select
                id="location"
                class="block appearance-none w-full
                        border border-gray-200 text-gray-700 rounded leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                        w-full"
                name="location"
            >
                <option disabled selected>- Selecciona -</option>

                @foreach ($locations as $location)
                    <option
                        {{ old('location') == $location->id ? 'selected' : '' }}
                        value="{{ $location->id }}"
                    >
                        {{$location->name}}
                    </option>
                @endforeach
            </select>

            @error('location')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="salary"
                class="block text-gray-700 text-sm mb-2"
            >Salary:</label>

            <select
                id="salary"
                class="block appearance-none w-full
                        border border-gray-200 text-gray-700 rounded leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                        w-full"
                name="salary"
            >
                <option disabled selected>- Selecciona -</option>

                @foreach ($salaries as $salary)
                    <option
                        {{ old('salary') == $salary->id ? 'selected' : '' }}
                        value="{{ $salary->id }}"
                    >
                        {{$salary->name}}
                    </option>
                @endforeach
            </select>
            @error('salary')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="description"
                class="block text-gray-700 text-sm mb-2"
            >Description of Position</label>

            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700 "></div>

            <input type="hidden" name="description" id="description" value="{{ old('description') }} " >
            @error('description')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="imagen"
                class="block text-gray-700 text-sm mb-2"
            >Position Imagen :</label>

            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>

            <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}" >
            @error('imagen')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
            <p id="error"></p>
        </div>

        <div class="mb-5">
            <label
                for="skills"
                class="block text-gray-700 text-sm mb-5"
            >Skills: <span class="text-xs">(choose unless 3)</span> </label>

            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
            @endphp
            <list-skills
                :skills="{{ json_encode($skills) }}"
                :oldskills="{{ json_encode( old('skills') ) }}"
            ></list-skills>
            @error('skills')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <button
            type="submit"
            class="bg-teal-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
        >Accept</button>
    </form>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha256-R0a97wz9RimQA9BJEMqcwuOckEMhIQcdtij32P5WpuI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js" integrity="sha256-OG/103wXh6XINV06JTPspzNgKNa/jnP1LjPP5Y3XQDY=" crossorigin="anonymous"></script>

    <script>

        Dropzone.autoDiscover = false;

        document.addEventListener('DOMContentLoaded', () => {

            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull',  'orderedlist', 'unorderedlist', 'h2', 'h3'],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'position informatacion'
                }
            });


            // Agrega al input hidden lo que el usuario escribe en medium editor
            editor.subscribe('editableInput', function(eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#description').value = contenido;
            })

             // Llena el editor con el contenido del input hidden
             editor.setContent( document.querySelector('#description').value );

            // Dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "../positions/imagen",
                dictDefaultMessage: 'Upload here your imagen',
                acceptedFiles: ".png,.jpg,.jpeg,.gif,.bmp",
                addRemoveLinks: true,
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function() {
                    if(document.querySelector('#imagen').value.trim() ) {
                       let imagenPosted = {};
                       imagenPosted.size = 1234;
                       imagenPosted.name = document.querySelector('#imagen').value;

                       this.options.addedfile.call(this, imagenPosted);
                       this.options.thumbnail.call(this, imagenPosted, `../storage/positions/${imagenPosted.name}`);

                       imagenPosted.previewElement.classList.add('dz-sucess');
                       imagenPosted.previewElement.classList.add('dz-complete');
                    }
                },
                success: function(file, response) {
                    // console.log(file);
                   //console.log(response);
                    console.log('file name ' + response.correct);
                    document.querySelector('#error').textContent = '';

                     document.querySelector('#imagen').value = response.correct;


                    file.nameServer = response.correct;
                },
                maxfilesexceeded: function(file) {
                    if( this.files[1] != null ) {
                        this.removeFile(this.files[0]);
                        this.addFile(file);
                    }
                },
                removedfile: function(file, response) {
                    console.log(file);
                   file.previewElement.parentNode.removeChild(file.previewElement);

                    params = {
                        imagen:file.nameServer ?? document.querySelector('#imagen').value
                    }

                    axios.post('../positions/deletimagen', params )
                        .then(respuesta => console.log(respuesta))
                }

            });


        })

    </script>
@endsection
