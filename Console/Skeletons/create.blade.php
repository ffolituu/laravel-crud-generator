@extends('layouts.app')

@section('content')
<h3>Ajouter _model_</h3>
@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreur !</strong> Veuillez compléter le formulaire correctement
        </div>
    @endif
<form action="{{ route('_table_.store') }}" method="POST">
    @csrf
    _form_group_
  <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>
</form>
@endsection