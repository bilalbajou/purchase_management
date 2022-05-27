@extends('layouts.admin')

@section('page_title')
        Fournisseur
@endsection

@section('content')
<div class="container-xl">
    <div class="table-responsive">
        
         <div class="d-flex flex-row-reverse mb-2">
        <button type="button" id="btn_export" class="btn btn-outline-primary ms-2">Exporter</button>
        <button type="button" id="btn_add" class="btn btn-outline-primary" data-target="#addModal" data-toggle="modal">Ajouter</button>
            </div>

        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>						
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($frns as $value) 
                       <tr>
                        <td>{{$value->id_frn}}</td> 
                        <td>{{$value->nom}}</td>
                        <td>{{$value->telephone}}</td>
                        <td>{{$value->adresse}}</td>
                        <td>
                          <a href="#" ><i class="fas fa-edit"></i></a>
                          <a href="#" ><i class="fas fa-remove"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Nouveau  fournisseur</h5>
        <button type="button" id="add_close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form action="{{route('fournisseurs.store')}}" id="frm_add" method="POST" enctype="multipart/form-data" >
          @csrf
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="Nom" name="nom" id="nom" required>
            <label for="floatingInput">Nom</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingPassword" placeholder="Adresse" name="adr" id="adr" required>
            <label for="floatingPassword">Adresse</label>
          </div>
          <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="floatingPassword" placeholder="telephone" name="tel" id="tel" required>
            <label for="floatingPassword">Téléphone</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_add_close">Close</button>
        <button type="button" type="submit"  class="btn btn-primary" id="btn_submit">Ajouter</button>
      </div>
    </div>
  </div>
</div>
@endsection