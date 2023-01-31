@include('partials.header')
<?php $array = array('title' => 'Student System') ;?>
<x-nav :data="$array"/>


<header class="max-w-lg mx-auto mt-10">
   <a href="#">
      <h1 class="text-5xl font-bold text-white text-center">STUDENT LIST</h1>
   </a>
</header>
 
<section class="mt-12 ">
   <div class="overflow-x-auto relative px-10">
         <div class="grid md:grid-cols-4 md:grid-rows-3 text-center gap-10">
            @foreach ($students as $student)
               <div>
                 <div class="block rounded-lg shadow-lg bg-white">
                  <div class="overflow-hidden rounded-t-lg h-16" style="background-color: #163057;"></div>
                  <div class="w-20 -mt-12 overflow-hidden border border-2 border-white rounded-full mx-auto bg-white">
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
                     <a href="/student/{{$student->id}}" class="bg-gray-800 text-white px-4 py-1 rounded transition duration-300 ease-in-out hover:text-white hover:bg-gray-600">VIEW</a>
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

