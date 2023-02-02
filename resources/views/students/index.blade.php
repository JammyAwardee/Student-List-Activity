@include('partials.header')
<?php $array = array('title' => 'Student System') ;?>
<x-nav :data="$array"/>


<header class="max-w-lg mx-auto mt-10">
   <a href="#">
      <h1 class="text-5xl font-bold text-white text-center">STUDENT LIST</h1>
   </a>
</header>


<div class="container">
   <form action="{{url('/search')}}" method="POST" role="search">
     @csrf
     <div class="relative w-full mt-10 px-10">
       <input type="text" class="form-control block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" name="q" placeholder="Search Name, Email, Age, Gender..."><span class="input-group-btn">
        <button type="submit" class="btn btn-info mx-10 absolute top-0 right-0 text-sm font-medium text-white bg-blue-400 rounded-r-lg hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-400 dark:hover:bg-gray-400 dark:focus:ring-blue-800">
    
<svg xmlns="http://www.w3.org/2000/svg" height="41.5" width="56" fill="white"><path d="M39.8 41.95 26.65 28.8q-1.5 1.3-3.5 2.025-2 .725-4.25.725-5.4 0-9.15-3.75T6 18.75q0-5.3 3.75-9.05 3.75-3.75 9.1-3.75 5.3 0 9.025 3.75 3.725 3.75 3.725 9.05 0 2.15-.7 4.15-.7 2-2.1 3.75L42 39.75Zm-20.95-13.4q4.05 0 6.9-2.875Q28.6 22.8 28.6 18.75t-2.85-6.925Q22.9 8.95 18.85 8.95q-4.1 0-6.975 2.875T9 18.75q0 4.05 2.875 6.925t6.975 2.875Z"/></svg>
   </button>
       </span>
       
     </div>
   </form> 
 </div>

<section class="mt-12 ">
   <div class="overflow-x-auto relative px-10">
         <div class="grid md:grid-cols-4 md:grid-rows-3 text-center gap-10">
            @foreach ($students as $student)
               <div>
                 <div class="block rounded-lg shadow-lg bg-white cursor-pointer">
                  <div class="overflow-hidden rounded-t-lg h-16" style="background-color: #45b3e0;"></div>
                  <div class="w-20 -mt-8 overflow-hidden border border-2 border-white rounded-full mx-auto bg-white">
                     <img @if (($student-> gender) == "Male") src="https://avataaars.io/?avatarStyle=Circle&topType=ShortHairShortWaved&accessoriesType=Blank&hairColor=Black&facialHairType=Blank&clotheType=BlazerSweater&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light" @else src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairStraight&accessoriesType=Blank&hairColor=Black&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light" @endif alt="">
                   </div>
                   <div class="p-6">
                     <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Name</dt>
                            <dd class="text-lg font-semibold">{{ $student-> first_name }}  {{ $student-> last_name }}</dd>
                        </div>
                        <div class="flex flex-col py-1">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email</dt>
                            <dd class="text-lg font-semibold">{{ $student-> email }}</dd>
                        </div>
                        <div class="flex flex-col py-1">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Age</dt>
                            <dd class="text-lg font-semibold">{{ $student-> age }}</dd>
                        </div>
                        <div class="flex flex-col pt-1">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Gender</dt>
                            <dd class="text-lg font-semibold">{{ $student-> gender }}</dd>
                        </div>
                    </dl>
                    <h4 class="py-4 px-6 mt-1">
                     <a href="/student/{{$student->id}}" class="bg-gray-600 text-white px-4 py-1 rounded transition duration-300 ease-in-out hover:text-white hover:bg-gray-400">VIEW</a>
                    </h4>            
                   </div>
                 </div>
               </div>
            @endforeach
         </div>
         <div class="mx-auto max-w-lg pt-6 p-4">
            {{$students->links()}}
         </div>
   </div>
</section>

@include('partials.footer')

