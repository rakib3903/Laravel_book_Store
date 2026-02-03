@extends('layouts')

@section("title", "Home")

@section('content')
   <div class="flex justify-end mt-5 mr-10">
      <a href="{{route('bookpage')}}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">
         add book
      </a>
   </div>

   <div class="overflow-x-auto mx-10 text-center">
      <table class="min-w-full border border-gray-200 rounded-lg">
         <thead class="bg-gray-100">
            <tr>
               <th class="px-4 py-2 text-sm font-semibold text-gray-700 border">
                  No.
                </th>
                <th class="px-4 py-2 text-sm font-semibold text-gray-700 border">
                  Book Title
                </th>
                <th class="px-4 py-2 text-sm font-semibold text-gray-700 border">
                    Writer
                </th>
                <th class="px-4 py-2 text-sm font-semibold text-gray-700 border">
                    Action
                </th>
            </tr>
         </thead>

         <tbody>
              @forelse($books as $key => $book)
              
                  <tr class="hover:bg-gray-50">
                     <td class="px-4 py-2 border">{{$key + 1}}</td>
                     <td class="px-4 py-2 border">{{$book['title']}}</td>
                     <td class="px-4 py-2 border">{{$book['writer']}}</td>
                     <td class="px-4 py-2 border text-center">
                        <a href="{{ route('edit', $book['id']) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                              Edit
                        </a>
                        <a href = "{{route('delete', $book['id'])}}"class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 ml-2">
                              Delete
                        </a>
                     </td>
                  </tr>
               @empty
                  <tr>
                     <td colspan="4" class="text-center text-gray-500 py-4">
                           No books found
                     </td>
                  </tr>
               @endforelse
         </tbody>
      </table>
   </div>


  
@endsection