<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITC | Detail Lomba</title>
    <link rel="stylesheet" href="../../css/app.css">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-blue-200">
    <div class="awan">
        <img src="{{ asset('images/Awan 6.png') }}" alt="" class="-z-10 fixed ml-[2000px] -mt-20 scale-50 md:transform-none" id="awan-1">
        <img src="{{ asset('images/Awan 4.png') }}" alt="" class="-z-20 fixed mt-[100px] scale-50 ml-[2000px] md:transform-none" id="awan-2">
    </div>
    <div class="container  mx-auto mt-20 flex justify-center">
        <div class="container-main bg-slate-50 w-2/3 relative justify-center mb-10 rounded-sm"> 
            <div class="content-atas mb-6 text-center mt-10">
                <button type="button" class="h-4 w-12 text-[9px] text-center text-white bg-blue-700 rounded-sm hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 absolute top-0 right-0 mt-2 mr-[120px]">‎  REGISTER  ‎</button>
                <button type="button" class="h-4 w-12 text-[9px] text-center text-white bg-blue-700 rounded-sm hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 absolute top-0 right-0 mt-2 mr-16">‎  REGISTER  ‎</button>
                <button type="button" class="h-4 w-12 text-[9px] text-center text-white bg-blue-700 rounded-sm hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 absolute top-0 right-0 mt-2 mr-2">‎  REGISTER  ‎</button>
                <button type="button" class="h-4 w-12 text-[9px] text-center text-white bg-blue-700 rounded-sm hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 absolute top-0 left-0 mt-2 ml-2">‎  REGISTER  ‎</button>
                <p class="text-lg mb-4 font-medium">ICT BUSINESS DEVELOPMENT</p>
                <p class="mb-6 text-xs">Register Fee <span class="border-2 rounded-md border-none bg-red-100 text-red-500">‎ RP 50.000 ‎</span> / Team</p>
            </div>
            <p class="mt-20 mb-4 mx-auto text-xs font-thin text-center w-3/5">Bisnis TIK adalah Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum, provident!</p>
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700 flex justify-center">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Schedules</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Payment</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-styled-tab" data-tabs-target="#styled-settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Prize</button>
                    </li>
                </ul>
            </div>
            <div id="default-styled-tab-content" class="flex justify-center z-20 mt-10 h-64">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800 " id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-settings" role="tabpanel" aria-labelledby="settings-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>