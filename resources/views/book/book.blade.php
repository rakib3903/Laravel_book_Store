@extends('../layouts')

@section('title', 'Books')

@section('content')
    <div class="flex justify-center">
        <div class="w-1/2 mt-10 max-w-md bg-white rounded-2xl shadow-2xl p-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">
                Add a book
            </h2>

            <form class="space-y-5" method="POST" action="{{route('book')}}">
                @csrf
            
                <div>
                    <input
                        type="email"
                        name="email"
                        value = "{{auth()->user()->email}}"
                        hidden
                        placeholder="example@email.com"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Book Title
                    </label>
                    <input
                        type="text"
                        placeholder="enter a book title"
                        name="title"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    />
                    @error('title')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Book Writer
                    </label>
                    <input
                        type="text"
                        placeholder="enter the writer name"
                        name="writer"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    />
                    @error('writer')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-300"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
