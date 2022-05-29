@extends('layouts.admin')

@section('page_title')
 
Modifier

@endsection


@section('content')
   <div class="container-fluid">
    @if (\Session::has('success'))
    <div class="alert alert-primary d-flex  justify-content-start mb-2" role="alert">
      {!! \Session::get('success') !!}
    </div>
    @endif
    <form action="{{route('fournisseurs.update',$frn->id_frn)}}" method="POST" >
        @csrf       
        @method('PUT')

<div class="row">
  <div class=" mb-3 col-sm-12 col-lg-6 col-md-6">
    <label for="nom" class="form-label">Nom</label>
  <input type="text" class="form-control form-control-lg"  value="{{$frn->nom}}" name="nom" required>
  </div>
  <div class=" col-sm-12 col-lg-6 col-md-6">
    <label for="adr" class="form-label">Adresse</label>
  <input type="text" class="form-control form-control-lg"  value="{{$frn->adresse}}" name="adr" required>
  </div>
  <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
    <label for="tel" class="form-label">Téléphone</label>
    <input type="number" class="form-control form-control-lg"  value="{{$frn->telephone}}" name="tel" required>
  </div>
</div>
<input type="reset" class="btn btn-dark" >
<input type="submit"  class="btn btn-primary"  value="Modifier">
</form>
</div>

@endsection