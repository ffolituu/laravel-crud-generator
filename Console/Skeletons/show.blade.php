@extends('layouts.app')

@section('content')
<h3>Détail de la _table_</h3>
<table class="table">
  <thead>
    <tr>
      _th_fields_<th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      _td_fields_<td>
      <a href="{{route('_table_.edit', $_model_lower_->id)}}" class="btn btn-sm btn-info">Editer</a>
      <form action="{{ route('_table_.destroy',$_model_lower_->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
  </tbody>
</table>
@endsection