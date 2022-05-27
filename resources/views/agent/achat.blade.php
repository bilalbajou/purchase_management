@extends('layouts.admin')

@section('page_title')
        Achat
@endsection

@section('content')
<div class="container-xl">
    <div class="table-responsive">
      <div class="d-flex">
         
         @if (\Session::has('success'))
         <div class="alert alert-primary d-flex  justify-content-start mb-2" role="alert">
           {!! \Session::get('success') !!}
         </div>
         @endif
         <div class="d-flex  mb-2 justify-content-end">
          <button type="button" id="btn_add" class="btn btn-outline-primary ms-2" data-target="#addModal" data-toggle="modal">Ajouter</button>
          <button type="button" id="btn_export" class="btn btn-outline-primary ms-2">Exporter</button>

         </div>
      </div>

        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
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
                       <tr>
                        <td>{{$value->id_achat}}</td>
                        <td>{{$value->libellé}}</td>
                        <td>{{$value->date_achat}}</td>
                        <td>{{$value->montant_total}}</td>
                        <td>{{$value->nom}}</td>
                        <td>
                          <form action="{{route('achats.destroy',$value->id_achat)}}" method="POST" id="frm_remove">
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
         
        </div>
    </div>
</div>     
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="libll" id="libll" required>
            <label for="floatingInput">Libellé</label>
            <div class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingPassword" placeholder="Password" name="achatDate" id="date_achat" required>
            <label for="floatingPassword">Date d'achat</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingPassword" placeholder="Password" name="montant" id="montant" required>
            <label for="floatingPassword">Montant</label>
          </div>
          <div class="input-group mb-3">
            @if (count($frns)=== 0)
            <button type="button"  class="btn btn-primary" id="btn_frn">Ajouter fournisseur</button>
            @else     
            <label class="input-group-text" for="inputGroupSelect01">Fournisseur</label>
            <select class="form-select" id="inputGroupSelect01" name="frn" id="frn" required>
              @foreach ($frns as $value)
                  <option value="{{$value->id_frn}}">{{ $value->nom }}</option>
              @endforeach
            </select>
            @endif
          </div>
          <div>
            <label for="formFileLg" class="form-label">Bon</label>
            <input name="bon" class="" id="formFileLg" type="file" id="bon"  required>
            <input type="hidden" name="agent" value="{{$agent}}" id="agent">
          </div>
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_add_close" >Fermer</button>
        <input type="submit"  class="btn btn-primary"  value="Ajouter">
      </div>
    </form>

    </div>
  </div>
</div>
@endsection