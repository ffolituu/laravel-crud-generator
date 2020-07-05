@extends('layouts.app')

@section('content')
<h3 class="">Modification _model_lower_</h3>
@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreur !</strong> Veuillez compléter le formulaire correctement
        </div>
    @endif
<form action="{{ route('_table_.update',$_model_lower_->id) }}" method="POST">
    @csrf
    @method('PUT')
    _form_group_
  <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>
</form>
@endsection