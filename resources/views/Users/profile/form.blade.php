<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div>
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Team</label>
                    <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 ">No Telepon</label>
                    <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 ">Kategori Lomba</label>
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected>Choose a country</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="relative mb-6">
                    <label for="steps-range" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Range steps</label>
                    <input id="steps-range" type="range" min="0" max="1" value="2.5" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                </div>

            </div>
        </div>
    </div>
</x-app-layout>