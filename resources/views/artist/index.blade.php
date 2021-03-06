@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h2>Data Artis</h2>
                </div>
                <div class="row">
                    <div class="col-md"> <a href="{{ url("/artist/create") }}" class="btn btn-primary">Tambah data</a></div>
                </div>
               
                <div class="card-body">
                    @if(session()->get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session()->get('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif 
                    <div class="text-center">
                        
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th>No</th>                
                                <th>Nama Artis</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($artist as $item)
                 
                            <tr>
                                <td>{{ $loop-> iteration }}</td>
                                <td>{{ $item-> artist_name }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url("/artist/{$item->artist_id}/edit") }}">Edit</a>
                            |<form class="d-inline" action="{{url ("artist/{$item->artist_id}")}}" method="post"
                                    onsubmit="return confirm('Yakin Hapus Data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

