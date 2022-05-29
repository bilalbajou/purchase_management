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
    <form action="{{route('achats.update',$achat->id_achat)}}" method="POST" enctype="multipart/form-data">
        @csrf       
        @method('PUT')

   <div class="row">
   <div class=" mb-3 col-sm-12 col-lg-6 col-md-6">
    <label for="libll" class="form-label">Libellé</label>
  <input type="text" class="form-control form-control-lg"  value="{{$achat->libellé}}" name="libll" required>
  </div>
  <div class=" col-sm-12 col-lg-6 col-md-6">
    <label for="date_achat" class="form-label">Date d'achat</label>
  <input type="date" class="form-control form-control-lg"  value="{{$achat->date_achat}}" name="date_achat" required>
  </div>
  <div class=" col-sm-12 col-lg-6 col-md-6">
    <label for="montant" class="form-label">Montant</label>
    <input type="number" class="form-control form-control-lg"  value="{{$achat->montant_total}}" name="montant" required>
  </div>
  <div class=" col-sm-12 col-lg-6 col-md-6">
    <label for="frn" class="form-label">Fournisseur</label>
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="frn" required>
        @foreach ($frns as $value)
        <option value="{{$value->id_frn}}">{{$value->nom}}</option>
        @endforeach
        
      </select>
        </div>
  <div class=" col-sm-12 col-lg-6 col-md-6 mb-3">
    <label for="bon" class="form-label">Bon</label>
    <input type="file" class="form-control form-control-lg" name="bon" value="{{$achat->bon}}" >
    <input type="hidden" name="agent" value="{{$agent}}">
  </div>
</div>
<input type="reset" class="btn btn-dark" >
<input type="submit"  class="btn btn-primary"  value="Modifier">
</form>

</div>

@endsection