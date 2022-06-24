@extends('layouts.admin2')

@section('page_title')
Agent
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
        @error('email')
             <div class="d-flex">
              <div class="alert alert-danger d-flex  justify-content-start mb-2" role="alert">
                Email existe déjà
              </div>
             </div>
        @enderror
        @if (\Session::has('success'))
        <div class="alert alert-primary d-flex  justify-content-start mb-2" role="alert">
          {!! \Session::get('success') !!}
        </div>
        @endif
         <div class="d-flex  mb-2 justify-content-end">
          <button type="button" id="btn_add" class="btn btn-outline-primary ms-2" data-target="#addModal" data-toggle="modal">Ajouter</button>
          <a href="{{route('agents.export')}}"> <button type="button" id="btn_export" class="btn btn-outline-primary ms-2">Exporter</button></a>
          
         </div>
      </div>

        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nom</th>						
                        <th class="text-center">Prénom</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($user as $value)
                       <tr class="text-center">
                        <td>{{++$i}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->first_name}}</td>
                        <td>{{$value->email}}</td>            
                        <td>
                          @if ($value->etat_compte=="A")
                          <form action="{{route('agents.désactiver',$value->id)}}" method="POST" >
                            @csrf
                            @method('PUT') 
                            <button type="submit"  class="btn btn-outline-primary btn-sm" >Désactiver</button>
                            </form>
                               
                             @else 
                             <form action="{{route('agents.activer',$value->id)}}" method="POST">
                            @csrf
                            @method('PUT') 
                            <button type="submit" class="btn btn-outline-primary btn-sm" >Activer</button>
                            </form>
                            @endif
                       </td>
                    </tr>
                  @endforeach
                   
                    
                </tbody>
            </table>
         
        </div>
        <div class="d-flex justify-content-center">
          {!! $user->links() !!}
      </div>
    </div>
</div>     
<div class="modal fade" id="addModal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nouveau agent</h5>
        <button id="add_close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('agents.store')}}" id="frm_add" method="POST">
          @csrf
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="nom" name="nom"  required>
            <label for="floatingInput">Nom</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingPassword" placeholder="prenom" name="prenom"  required>
            <label for="floatingPassword">Prénom</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingPassword" placeholder="email" name="email" required>
            <label for="floatingPassword">Email</label>
          </div>
          <select class="form-select" id="inputGroupSelect01" name="type"  required>
                <option value="agent">Agent</option>
                <option value="admin">Admin</option>
          </select>
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


