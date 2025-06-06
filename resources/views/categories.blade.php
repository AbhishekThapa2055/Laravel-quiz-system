<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Categories Page</title>
    @vite('resources/css/app.css')
</head>
<body >
    <x-navbar name={{$name}}> </x-navbar>
    @if(session('category'))
    <div class='bg-emerald-600 text-amber-50 pl-10'> {{session('category')}}</div>
    @endif
    <div class="flex items-center justify-center mt-40">
    <div class="bg-white p-8 rounded-2xl shadow-lg  max-w-sm">
        <h2 class="text-2xl text-center mb-6"> Add Categories</h2>
            @error('user')
           <div class="text-red-500"> {{$message}} </div>
            @enderror
        <form action="/add-category" method="post" class="space-y-4">
            @csrf
            <div>
    <label for="" class="mb-2"> Categories Name </label>
    <input type="text" placeholder="Enter categories name" 
    class="w-full px-4 py-2 border border-gray-300 rounded-xl
    focus:outline-none
    "
    name="category"
    >
    @error('name')
    <div class="text-red-500">{{$message}}</div>
@enderror
</div>

<button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white"> Add</button>
</div>
    </div>
    <div class="flex items-center justify-center mt-5 ">
        
        <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
              <thead>
                  <tr>
                      <th class="p-4 border-b border-slate-300 bg-slate-50">
                          <p class="block text-sm font-normal leading-none text-slate-500">
                              S.NO
                          </p>
                      </th>
                      <th class="p-4 border-b border-slate-300 bg-slate-50">
                          <p class="block text-sm font-normal leading-none text-slate-500">
                              Category Name
                          </p>
                      </th>
                      <th class="p-4 border-b border-slate-300 bg-slate-50">
                          <p class="block text-sm font-normal leading-none text-slate-500">
                              Creator
                          </p>
                      </th>
                      <th class="p-4 border-b border-slate-300 bg-slate-50">
                          <p class="block text-sm font-normal leading-none text-slate-500">
                              Action
                          </p>
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                  <tr class="hover:bg-slate-50">
                      <td class="p-4 border-b border-slate-200">
                          <p class="block text-sm text-slate-800">
                              {{$category->id}}
                          </p>
                      </td>
                      <td class="p-4 border-b border-slate-200">
                          <p class="block text-sm text-slate-800">
                              {{$category->name}}
                          </p>
                      </td>
                      <td class="p-4 border-b border-slate-200">
                          <p class="block text-sm text-slate-800">
                              {{$category->creator}}
                          </p>
                      </td>
                      <td class="p-4 border-b border-slate-200">
                          <p class="block text-sm text-slate-800">
                              Delete
                          </p>
                      </td>
                  </tr>
                 @endforeach
              </tbody>
            </table>
            <div class="p-4 flex justify-center space-x-5">
               <div> {{ $categories->links() }} </div>
            </div>
          </div>
              <!-- Pagination -->
       
        </div>
    </div>

</body>
</html>