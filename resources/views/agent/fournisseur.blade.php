@extends('layouts.admin')

@section('page_title')
        Fournisseur
@endsection

@section('content')
<div class="container-xl">
    <div class="table-responsive">      
      <div class="d-flex">
        @if ($errors->any())
        <div class="alert alert-danger d-flex  justify-content-start mb-2alert alert-danger">
            
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
         @endif
        @if (\Session::has('success'))
        <div class="alert alert-primary d-flex  justify-content-start mb-2" role="alert">
          {!! \Session::get('success') !!}
        </div>
        @endif
        <div class="d-flex  mb-2 justify-content-end">
         <button type="button" id="btn_add" class="btn btn-outline-primary ms-2" >Ajouter</button>
        <a href="{{route('frns.export')}}"><button type="button" id="btn_export" class="btn btn-outline-primary ms-2">Exporter</button></a>

        </div>
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
                          <form action="{{route('fournisseurs.destroy',$value->id_frn)}}" method="POST">
                            @csrf
                            @method('DELETE') 

                          <a href="{{ route('fournisseurs.edit',$value->id_frn) }}" ><i class="fas fa-edit"></i></a>
                          <button type="submit"  style="border-style: none;background-color:transparent;"><i class="fas fa-remove"></i></button> 
                          </form>
                      </td>
                    </tr>
                  @endforeach
                   
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {!! $frns->links() !!}
          </div>
        </div>
    </div>
</div>     
<div class="modal fade" id="addModal"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau  fournisseur</h5>
        <button type="button" id="add_close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form action="{{route('fournisseurs.store')}}"  method="POST" >
          @csrf
          <div class="form-floating mb-3">
            <input type="text" class="form-control"  placeholder="Nom" name="nom"  required>
            <label for="nom">Nom</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control"  placeholder="Adresse" name="adr" id="adr" required>
            <label for="adr">Adresse</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control"  placeholder="telephone" name="tel" required>
            <label for="tel">Téléphone</label>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn_add_close">Close</button>
        <button type="submit" type="submit"  class="btn btn-primary" >Ajouter</button>
      </div> 
    </form>
    </div>
  </div>
</div>
@endsection