@extends('layouts.admin')

@section('page_title')
        Achat
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
                        <th>Name</th>						
                        <th>Date Created</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar"> Michael Holz</a></td>
                        <td>04/10/2013</td>                        
                        <td>Admin</td>
                        <td><span class="status text-success">&bull;</span> Active</td>
                        <td>
                            <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="#"><img src="/examples/images/avatar/2.jpg" class="avatar" alt="Avatar"> Paula Wilson</a></td>
                        <td>05/08/2014</td>                       
                        <td>Publisher</td>
                        <td><span class="status text-success">&bull;</span> Active</td>
                        <td>
                            <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><a href="#"><img src="/examples/images/avatar/3.jpg" class="avatar" alt="Avatar"> Antonio Moreno</a></td>
                        <td>11/05/2015</td>
                        <td>Publisher</td>
                        <td><span class="status text-danger">&bull;</span> Suspended</td>                        
                        <td>
                            <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                        </td>                        
                    </tr>
                    <tr>
                        <td>4</td>
                        <td><a href="#"><img src="/examples/images/avatar/4.jpg" class="avatar" alt="Avatar"> Mary Saveley</a></td>
                        <td>06/09/2016</td>
                        <td>Reviewer</td>
                        <td><span class="status text-success">&bull;</span> Active</td>
                        <td>
                            <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><a href="#"><img src="/examples/images/avatar/5.jpg" class="avatar" alt="Avatar"> Martin Sommer</a></td>
                        <td>12/08/2017</td>                        
                        <td>Moderator</td>
                        <td><span class="status text-warning">&bull;</span> Inactive</td>
                        <td>
                            <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                        </td>
                    </tr>
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
        <button type="button" id="add_close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('achats.store')}}" id="frm_add" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="libll">
            <label for="floatingInput">Libellé</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingPassword" placeholder="Password" name="achatDate">
            <label for="floatingPassword">Date d'achat</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingPassword" placeholder="Password" name="montant">
            <label for="floatingPassword">Montant</label>
          </div>
          <div class="input-group mb-3">
            @if (count($frns)=== 0)
            <button type="button"  class="btn btn-primary" id="btn_submit">Ajouter fournisseur</button>
            @else     
            <label class="input-group-text" for="inputGroupSelect01">Fournisseur</label>
            <select class="form-select" id="inputGroupSelect01" name="frn">
              @foreach ($frns as $value)
                  <option value="{{$value->id_frn}}">{{ $value->nom }}</option>
              @endforeach
            </select>
            @endif
          </div>
          <div>
            <label for="formFileLg" class="form-label">Bon</label>
            <input name="bon" class="" id="formFileLg" type="file"  >
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn_add_close">Close</button>
        <button type="button"  class="btn btn-primary" id="btn_submit">Ajouter</button>
      </div>
    </div>
  </div>
</div>
@endsection