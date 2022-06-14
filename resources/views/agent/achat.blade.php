@extends('layouts.admin')

@section('page_title')
        Achat
@endsection

@section('content')
<div class="container-xl">
    <div class="table-responsive">
      <div class="d-flex">
        @if (\Session::has('error'))
        <div class="alert alert-danger d-flex  justify-content-start mb-2" role="alert">
          {!! \Session::get('error') !!}
        </div>
        @endif
         @if (\Session::has('success'))
         <div class="alert alert-primary d-flex  justify-content-start mb-2" role="alert">
           {!! \Session::get('success') !!}
         </div>
         @endif
         <div class="d-flex  mb-2 justify-content-end">
          <button type="button" id="btn_add" class="btn btn-outline-primary ms-2">Ajouter</button>
          <a href="{{ route('achats.export') }}"><button type="button"  class="btn btn-outline-primary ms-2">Exporter</button></a>
         </div>
      </div>

        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Libellé</th>						
                        <th>Date d'achat</th>
                        <th>Montant</th>
                        <th>Fournisseur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($achats as $value)
                       <tr class="text-center">
                        <td>{{++$i}}</td>
                        <td>{{$value->libellé}}</td>
                        <td>{{$value->date_achat}}</td>
                        <td>{{$value->montant_total}} DH</td>
                        <td>{{$value->nom}}</td>
                        <td>
                          <form action="{{route('achats.destroy',$value->id_achat)}}" method="POST" >
                            @csrf
                            @method('DELETE') 

                          <a href="{{ route('achats.edit',$value->id_achat) }}" ><i class="fas fa-edit"></i></a>
                          <button type="submit"  style="border-style: none;background-color:transparent;"><i class="fas fa-remove"></i></button> 
                          </form>
                      </td>
                    </tr>
                  @endforeach
                   
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {!! $achats->links() !!}
          </div>
        </div>
    </div>
</div>     
<div class="modal fade" id="addModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau achat</h5>
        
        <button id="add_close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
        
        <form action="{{route('achats.store')}}" id="frm_add" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-floating mb-3">
            <input type="text" class="form-control"  placeholder="libellé" name="libll"  required>
            <label for="libll">Libellé</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" placeholder="date_achat" name="achatDate" required>
            <label for="achatDate">Date d'achat</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" placeholder="montant" name="montant" required>
            <label for="montant">Montant (DH)</label>
          </div>
          <div class="input-group mb-3">
            @if (count($frns)=== 0)
            <a href="{{route('fournisseurs.index')}}"><button type="button"  class="btn btn-primary" >Ajouter Fournisseur</button></a>
            @else     
            <label class="input-group-text" for="frn">Fournisseur</label>
            <select class="form-select" id="inputGroupSelect01" name="frn"  required>
              @foreach ($frns as $value)
                  <option value="{{$value->id_frn}}">{{ $value->nom }}</option>
              @endforeach
            </select>
            @endif
          </div>
          <div>
            <label for="bon" class="form-label">Bon</label>
            <input name="bon" class=""  type="file" id="bon"  >
            <input type="hidden" name="agent" value="{{$agent}}" >
          </div>
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  id="btn_add_close" >Fermer</button>
        <input type="submit"  class="btn btn-primary"  value="Ajouter">
      </div>
    </form>

    </div>
  </div>
</div>
@endsection