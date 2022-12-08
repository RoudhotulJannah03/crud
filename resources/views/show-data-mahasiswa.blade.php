<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          

        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="left" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent 
                    text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>Tabel Mahasiswa</div>

                        <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414
                                     1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                     clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
        
                   
                    <x-slot name="content">
                        <x-dropdown-link :href="route('index')">
                            {{ __('input') }}
                        </x-dropdown-link>


                            <x-dropdown-link :href="route('show')">
                                {{ __('show') }}
                            </x-dropdown-link>

                    </x-slot>
                </x-dropdown>
            </div>
            </h2>
            
        </x-slot>
 </x-app-layout>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Data Mahasiswa</title>
</head>
<body>
   
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('input-mahasiswa')}}">Input Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('show-data-mahasiswa')}}">Daftar Data Mahasiswa</a>
                </li>
                </ul>
            </div>
      
   
    </div>
    <div class="container mt-5">
        @if(session('status'))
        <div class="alert alert-success mt-5">
            {{ session('status') }}
        </div>
    @endif
    @if(session('status-deleted'))
        <div class="alert alert-warning mt-5">
            {{ session('status-deleted') }}
        </div>
    @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Daftar Data Mahasiswa
            </div>
            <div class="card-body">
                <table  class="table table-primary table-striped">
                    <tr class="table-primary">
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th colspan=2>Action</th>
                    </tr>
                    @foreach($data as $isi)
                    <tr class="table-dark" style="width: 10%">
                        <td class="table-info">
                            {{ $isi -> nim }}
                        </td>
                        <td class="table-info" style="width: 20%">
                            {{ $isi -> nama }}
                        </td>
                        <td class="table-info" style="width: 5%">
                            {{ $isi -> umur }}
                        </td>
                        <td class="table-info" style="width: 25%">
                            {{ $isi -> alamat }}
                        </td>
                        <td class="table-info" style="width: 10%">
                            {{ $isi -> kota }}
                        </td>
                        <td class="table-info" style="width: 10%">
                            {{ $isi -> kelas }}
                        </td>
                        <td class="table-info" style="width: 10%">
                            {{ $isi -> jurusan }}
                        </td>
                        <td class="table-info" style="width: 5%">
                            <a href="{{ url('delete-mahasiswa')}}/{{ $isi->nim }}">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </a>
                        </td>
                        <td class="table-info" style="width: 5%">
                            <a href="{{url('edit-mahasiswa')}}/{{$isi->nim}}">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </table>
            </div>
        </div>
        </div>
</body>
</html>