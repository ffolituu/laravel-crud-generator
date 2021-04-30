@extends('layout-crud.layout')

@section('content')
<h3 class="float-start">_table_ list</h3>
<a href="{{route('_table_.create')}}" class="btn btn-primary btn-sm float-end mb-3">+ New</a>
<div class="clearfix mb-3"></div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif
<table class="table">
  <thead>
    <tr>
      _th_fields_<th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $d)
    <tr>
      _td_fields_<td>
        <a href="{{route('_table_.show', $d->id)}}" class="btn btn-sm btn-primary">Détails</a>
        <a href="{{route('_table_.edit', $d->id)}}" class="btn btn-sm btn-info">Editer</a>
        <form action="{{ route('_table_.destroy',$d->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection