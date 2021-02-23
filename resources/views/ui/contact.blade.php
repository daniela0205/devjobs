<aside class="md:w-2/5 bg-teal-500 p-5 rounded m-3">
    <h2 class="text-2xl my-1 text-white uppercase font-bold text-center">Contact the recruiter</h2>
    <form enctype="multipart/form-data" action={{route('applicants.store')}} method="POST">
        @csrf

        <div class="mb-4">
            <label
            for="name"
            class="block text-white text-sm font-bold mb-4"
        >Name:</label>

        <input
        id="name"
        type="text"
        class="p-3 bg-gray-100 rounded form-input w-full  @error('name') border border-red-500 @enderror"
        name="name"
        placeholder="Your Name"
        value="{{ old('name') }}"
        >

        @error('name')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block"> {{$message}}</span>
        </div>
    @enderror
        </div>

        <div class="mb-4">
            <label
            for="email"
            class="block text-white text-sm font-bold mb-4"
        >Email:</label>

        <input
        id="email"
        type="text"
        class="p-3 bg-gray-100 rounded form-input w-full  @error('email') border border-red-500 @enderror"
        name="email"
        placeholder="Your email"
        value="{{ old('email') }}"
        >

        @error('email')
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block"> {{$message}}</span>
        </div>
    @enderror
        </div>

        <div class="mb-4">
            <label for="cv" class="block text-white text-sm font-bold mb-4">
                CV (PDF):
            </label>
            <input
                id="cv"
                type="file"
                class="p-3 rounded form-input w-full @error('cv') border border-red-500  @enderror"
                name="cv"
                accept="application/pdf"
            />

            @error('cv')
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                    <p> {{$message}} </p>
                </div>
            @enderror
        </div>

        <input type="hidden" name="position_id" value="{{$position->id}}" >

        <input
            type="submit"
            class="bg-teal-600 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase"
            value="Send">
    </form>
</aside>
