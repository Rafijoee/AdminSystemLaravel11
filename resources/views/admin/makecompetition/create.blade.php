<x-app-layout>

    <div class="p-4 sm:ml-72 mt-4">
        <div class="py-12 mx-10 my-5 bg-white h-full z-50 border border-gray-300 flex flex-col rounded-xl shadow-lg">
            <!-- Header Section -->
            <div class="m-5 flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-800">Buat Kompetisi</h1>
                <a href="#" class="flex items-center justify-center w-10 h-10 bg-gray-200 rounded-full hover:bg-gray-300">
                    <img src="{{ asset('assets/itc.png') }}" alt="Icon" class="w-6 h-6">
                </a>
            </div>
            
            <!-- Divider Line -->
            <hr class="border-t-2 border-gray-300">
            
            <!-- Form Section (Example Form Elements for Creating Competition) -->
            <div class="p-5 space-y-5">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Kompetisi</label>
                    <input type="text" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
        
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="category" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>UX Design</option>
                        <option>KTI</option>
                        <option>Business Plan</option>
                    </select>
                </div>
        
                <div>
                    <label for="stages" class="block text-sm font-medium text-gray-700">Jumlah Stage</label>
                    <select id="stages" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
        
                <div>
                    <label for="file_type" class="block text-sm font-medium text-gray-700">Tipe File per Stage</label>
                    <select id="file_type" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>PDF</option>
                        <option>ZIP</option>
                        <option>TXT</option>
                    </select>
                </div>
        
                <div>
                    <label for="open_until" class="block text-sm font-medium text-gray-700">Batas Pengumpulan Stage</label>
                    <input type="datetime-local" id="open_until" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
        
            <!-- Submit Button -->
            <div class="flex justify-end m-5">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md shadow">
                    Submit
                </button>
            </div>
        </div>
        
    </div>

</x-app-layout>