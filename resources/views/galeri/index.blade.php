@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">list Galeri</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{!! route('galeri.create') !!}" class="btn btn-primary">Tambahkan Data</a>
                    <table border='2'>
                        <tr>
                            <td>ID</td>
                            <td>Nama</td>  
                            <td>Keterangan</td>
                            <td>Path</td> 
                            <td>Users_id</td> 
                            <td>Create</td>
                            <td>Update</td>
                            <td>Kategori_galeri_id</td>
                            <td>Aksi</td>
                        </tr>
                        @foreach($listGaleri as $item)
                        <tr>
                            <td>{!! $item->id !!}</td>
                            <td>{!! $item->nama !!}</td>
                            <td>{!! $item->keterangan !!}</td>
                            <td><img src="{!! asset ($item->path) !!}" width="100px"></td>
                            <td>{!! $item->users_id !!}</td>
                            <td>{!! $item->created_at->format('d/m/Y H:i:s') !!}</td>
                            <td>{!! $item->updated_at->format('d/m/Y H:i:s') !!}</td>
                            <td>{!! $item->kategori_galeri_id !!}</td>
                            <td>
                            
                                <a href="{!! route('galeri.show',[$item->id]) !!}" class="btn btn-sm btn-success">
                                    Lihat
                                </a>

                                <a href="{!! route('galeri.edit',[$item->id]) !!}" class="btn btn-sm btn-warning">
                                    Ubah
                                </a> 
                                {!! Form::open(['route' => ['galeri.destroy', $item->id],'method'=>'delete']) !!}

                                {!! Form::submit('Hapus',['class'=>'btn btn-sm btn-danger','onclick'=>"return confirm('Apakah anda yakin menghapus data ini?')"]); !!}

                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
