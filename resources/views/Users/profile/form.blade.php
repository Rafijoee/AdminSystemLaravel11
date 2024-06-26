<x-dashboard.layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="/profile" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <label for="team_name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Team</label>
                    <input value="{{$team ? $team->team_name : ''}}" name="team_name" type="text" id="team_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
                <div class="mb-6">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 ">No Telepon</label>
                    <input value="{{$team ? $team->phone : ''}}" name="phone" type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                </div>
                <div class="mb-6">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 ">Kategori Lomba</label>
                    <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="{{$team ? $team->category_id : ''}}" selected>{{$team ? $team->category->category_name : ''}}</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                @php
                $role_member = ['anggota_1', 'anggota_2', 'anggota_3'];
                @endphp
                @foreach($role_member as $index => $role)
                <div>
                    <h1 class="mb-4">Data {{$role}}
                        @if($index != 2)
                        <span class="text-red-600">*</span>
                        @endif
                    </h1>
                    <div class="mb-6">
                        <label for="name_{{$role}}" class="block mb-2 text-sm font-medium text-gray-900 ">Nama Lengkap</label>
                        <input name="name_{{$role}}" type="text" id="name_{{$role}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                    <div class="mb-6">
                        <label for="univ_{{$role}}" class="block mb-2 text-sm font-medium text-gray-900 ">Universitas</label>
                        <select name="univ_{{$role}}" id="univ_{{$role}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Pilih Univ</option>
                            @foreach($universities as $university)
                            <option value="{{$university->id}}">{{$university->university_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="ktm_{{$role}}">Upload Kartu tanda mahasiswa</label>
                        <input name="ktm_{{$role}}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" aria-describedby="file_input_help" id="ktm_{{$role}}" type="file">
                        <p class="mt-1 text-sm text-gray-500 " id="file_input_help">PDF (MAX:5mb)</p>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 " for="active_{{$role}}">Upload surat keterangan aktif</label>
                        <input name="active_{{$role}}" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none" aria-describedby="file_input_help" id="active_{{$role}}" type="file">
                        <p class="mt-1 text-sm text-gray-500 " id="file_input_help">PDF (MAX:5mb)</p>
                    </div>
                </div>
                @endforeach

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{$team ? 'Update' : 'Submit'}}</button>
        </div>
        </form>
    </div>
    </div>
</x-dashboard.layout>