<x-dashboard.layout>
   <div class="flex items-center justify-center h-48 mb-4 rounded">
      <img src="{{ asset('images/sample-header-form.png') }}" alt="itc-banner" class="w-full">
   </div>
   @if (session()->has('success'))
   <div id="alert-border-3" class="flex items-center mt-5 p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
      <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
         <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
      </svg>
      <div class="ms-3 text-sm font-medium">
         {{ session('success') }}
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
         <span class="sr-only">Dismiss</span>
         <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
         </svg>
      </button>
   </div>
   @endif
   <div class="grid grid-cols-3 gap-4 mb-4">
      <div class="flex items-center justify-center rounded bg-white border border-gray-200 dark:bg-gray-800 h-36">
         <p class="text-black dark:text-white text-center">
            <span class="font-black text-xl">Yanuario Adimada</span><br>
            <span class="text-sm font-normal">ICT SCIENTIFIC PAPER</span>
         </p>
      </div>
      <div class="flex items-center justify-center rounded bg-white border border-gray-200 dark:bg-gray-800 h-36">
         <p class="text-black dark:text-white text-center">
            <span class="font-black text-xl">081234567892</span><br>
            <span class="text-sm font-normal">Captain's Number</span>
         </p>
      </div>
      <div class="flex items-center justify-center rounded bg-white border border-gray-200 dark:bg-gray-800 h-36">
         <p class="text-black dark:text-white text-center">
            <span class="font-black text-xl">Universitas Indonesia</span><br>
            <span class="text-sm font-normal">College</span>
         </p>
      </div>
   </div>

   <!-- BAWAH KIRI -->
   <div class="grid grid-cols-2 mb-96">
      <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-200">
         <div class="mb-5"> <!-- JUMLAH MEMBER -->
            <h5 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">3</h5>
            <p class="text-gray-500">Members</p>
         </div>
         <div class="mb-5"> <!-- JUMLAH STAGE -->
            <h5 class="text-3xl font-bold text-gray-900 dark:text-white mb-1">3 Stage</h5>
            <p class="text-gray-500">Towards Champion</p>
         </div>
         <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse font-bold">
            <a href="#" class="w-full sm:w-auto bg-green-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-500">
               <div class="text-left rtl:text-right">
                  <div class="mb-1 text-sm">Verified</div>
               </div>
            </a>
            <a href="#" class="w-full sm:w-auto bg-green-600 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-500">
               <div class="text-left rtl:text-right">
                  <div class="mb-1 text-sm">Success</div>
               </div>
            </a>
         </div>
      </div>

      <!-- BAWAH KANAN -->
      <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-200 mx-4">
         <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
            <li class="me-2">
               <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Informations</button>
            </li>
            <li class="me-2">
               <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">About Us</button>
            </li>
         </ul>
         <div id="defaultTabContent">
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
               <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white z-20">Powering innovation & trust at 200,000+ companies worldwide</h2>
               <p class="mb-3 text-gray-500 dark:text-gray-400">Empower Developers, IT Ops, and business teams to collaborate at high velocity. Respond to changes and deliver great customer and employee service experiences fast.</p>
               <a href="#" class="inline-flex items-center font-medium text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-700">
                  Learn more
                  <svg class=" w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                  </svg>
               </a>
            </div>
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel" aria-labelledby="services-tab">
               <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">We invest in the worlds potential</h2>
               <!-- List -->
               <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                  <li class="flex space-x-2 rtl:space-x-reverse items-center">
                     <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                     </svg>
                     <span class="leading-tight">Dynamic reports and dashboards</span>
                  </li>
                  <li class="flex space-x-2 rtl:space-x-reverse items-center">
                     <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                     </svg>
                     <span class="leading-tight">Templates for everyone</span>
                  </li>
                  <li class="flex space-x-2 rtl:space-x-reverse items-center">
                     <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                     </svg>
                     <span class="leading-tight">Development workflow</span>
                  </li>
                  <li class="flex space-x-2 rtl:space-x-reverse items-center">
                     <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                     </svg>
                     <span class="leading-tight">Limitless business automation</span>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</x-dashboard.layout>