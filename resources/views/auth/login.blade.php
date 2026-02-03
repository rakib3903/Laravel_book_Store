@extends('layouts')


@section("title", "Login Form")
@section('content')
    <div class="flex justify-center">
        <div class="w-1/2 mt-10 max-w-md bg-white rounded-2xl shadow-2xl p-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-2">
                Login Here
            </h2>

            <form class="space-y-5" method="POST" action="{{route('login')}}">
                @csrf
            
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Email Address
                    </label>
                    <input
                        type="email"
                        name="email"
                        placeholder="example@email.com"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    />
                    @error('email')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>
                    <input
                        type="password"
                        placeholder="••••••••"
                        name="password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    />
                    @error('password')
                        <span class="text-sm text-red-600">{{$message}}</span>
                    @enderror
                </div>
                <button
                    type="submit"
                    class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-300"
                >
                    Login
                </button>
            </form>
            @if(session('error'))  
                <p class = "text-red-600 bg-green-10 text-center">{{ session('error') }}</p>
            @endif
            <p class="text-center text-sm text-gray-500 mt-6">
                Don't have an account?
                <a href="{{route('registerpage')}}" class="text-indigo-600 font-semibold hover:underline">
                    Register
                </a>
            </p>
        </div>
    </div>
@endsection
