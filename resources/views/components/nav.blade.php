<nav x-data="{open:false}" class="bg-gray-800 fixed w-full z-20 top-0 left-0 border-gray-200 px-2 sm:px-4 py-2.5 text-white">
    <div class="flex flex-wrap justify-between items-center">
      <a href="/">
         <span class="self-center text-xl font-semibold whitespace-nowrap">
            {{ $data['title'] }}
         </span>
      </a>
      <button @click="open = !open" data-collapse-toggle="navbar-main" class="md:hidden">
         <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" height="48" width="48" fill="white"><path d="M6 36v-3h36v3Zm0-10.5v-3h36v3ZM6 15v-3h36v3Z"/></svg>
         <svg x-show="open" xmlns="http://www.w3.org/2000/svg" height="48" width="48" fill="white"><path d="m12.45 37.65-2.1-2.1L21.9 24 10.35 12.45l2.1-2.1L24 21.9l11.55-11.55 2.1 2.1L26.1 24l11.55 11.55-2.1 2.1L24 26.1Z"/></svg>
      </button>
      <div x-show="open" class="w-full md:block md:w-auto" id="navbar-main">
         <x-items />
      </div>
      <div class="hidden w-full md:block md:w-auto" id="navbar-main">
         <x-items />
      </div>
</div>
</nav>