<x-dashboard.layout>

    <style>
        .file-preview {
            background-color: #ccffcc;
            /* Warna hijau muda */
            padding: 20px;
            border-radius: 8px;
            display: inline-block;
            margin-top: 20px;
        }

        .file-preview i {
            margin-right: 10px;
        }

        .file-preview a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>

    <div class=" bg-white rounded-2xl border-2 mx-20 my-10">

        <div class="mt-10 px-20 ">
            <h1 class="text-2xl font-bold text-blue-700 my-4">
                1<sup>st</sup> Stage Proposal Submission </h1>
            <hr class="border-1 border-gray-400">

            @if ($fileOnUpload)
            <div class="file-preview">
                <i class="fas fa-file-archive"></i>
                <a href="{{ asset($fileOnUpload) }}" download>{{ basename($fileOnUpload) }}</a>
            </div>
            <h2 class="text-1xl text-red-500 font-semibold my-6">Your file will be replaced with the latest one if you upload again.</h2>
            @else
            <h2 class="text-1xl font-semibold my-6">Submit your Documents</h2>
            @endif
            <form id="submission-form" action="/submissions1" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">ZIP (MAX:5mb)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" name="submission1" />
                    </label>
                </div>
                <div id="error-message" class="mt-4 text-left text-red-500"></div>
                <div id="file-preview" class="mt-4 text-center text-gray-500 dark:text-gray-400"></div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 my-10 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
            </form>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-[#40C6A1] dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul Aduan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status Verifikasi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status Handling
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 capitalize">
                                {{ $report->judul_laporan }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($report->verification_statuses_id == 2)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-yellow-200 rounded-lg text-gray-900">
                                    sedang diverifikasi
                                </div>
                                @elseif ($report->verification_statuses_id == 3)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-lime-300 rounded-lg text-gray-900">
                                    sudah diverifikasi
                                </div>
                                @elseif ($report->verification_statuses_id == 4)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-red-300 rounded-lg text-gray-900">
                                    Aduan ditolak
                                </div>
                                @else
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-sky-300 rounded-lg text-gray-900">
                                    belum diverifikasi
                                </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">

                                @if ($report->handling__statuses_id == 2)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-yellow-200 rounded-lg text-gray-900">
                                    sedang ditindaklanjuti
                                </div>
                                @elseif ($report->handling__statuses_id == 3)
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-lime-300 rounded-lg text-gray-900">
                                    sudah ditindaklanjuti
                                </div>
                                @else
                                <div class="w-1/2 px-2 text-center max-[1500px]:w-28 bg-sky-300 rounded-lg text-gray-900">
                                    belum ditindaklanjuti
                                </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <a href="/dashboard/pengaduan-pemerintah/{{ Crypt::encryptString($report["id"]) }}/edit" class="font-medium text-[#40C6A1] hover:underline">Lihat</a>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <script>
        document.getElementById('submission-form').addEventListener('submit', function(event) {

            const fileInput = document.getElementById('dropzone-file');
            const errorMessage = document.getElementById('error-message');

            if (fileInput.files.length === 0) {
                event.preventDefault();
                errorMessage.textContent = 'File harus diisi!';
            } else {
                errorMessage.textContent = '';
            }
        });

        document.getElementById('dropzone-file').addEventListener('change', function(event) {
            const fileList = event.target.files;
            const preview = document.getElementById('file-preview');
            const errorMessage = document.getElementById('error-message');
            preview.innerHTML = ''; // Clear any existing content
            errorMessage.textContent = ''; // Clear any existing error message

            if (fileList.length > 0) {
                for (let i = 0; i < fileList.length; i++) {
                    const file = fileList[i];
                    const listItem = document.createElement('p');
                    listItem.textContent = `File: ${file.name} (${(file.size / 1024).toFixed(2)} KB)`;
                    preview.appendChild(listItem);
                }
            } else {
                preview.textContent = 'No file selected';
            }
        });
    </script>

    </x-app-layout>