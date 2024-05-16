<x-dashboard.layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="/submissions1" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Upload surat keterangan aktif</label>
                    <input name="submission1" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none   " aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 " id="file_input_help">PDF (MAX:5mb)</p>
                </div>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">kUMPULKAN</button>
    </div>

    </form>
    </div>
    </div>
    </x-app-layout>