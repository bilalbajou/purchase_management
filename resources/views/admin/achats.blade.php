@extends('layouts.admin2')

@section('page_title')
Agent
@endsection
@section('content')
<div class="container-xl">
   
           {{-- <form>  
               <div class="row">
                 <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="libll"  placeholder="Libellé">
                        <label for="floatingInput">Libellé</label>
                      </div>
                 </div>
                 <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="du"  placeholder="De">
                        <label for="floatingInput">De</label>
                      </div>
                 </div>
                 <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="A"  placeholder="A">
                        <label for="floatingInput">A</label>
                      </div>
                 </div>
                 <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="form-floating mb-3">
                        <label class="input-group-text" for="frn">Fournisseur</label>
                        <select class="form-select" id="inputGroupSelect01" name="frn"  required>
                          @foreach ($frns as $value)
                              <option value="1">{{$value->nom}}</option>
                          @endforeach
                        </select>                      </div>
                 </div>
               </div>     
               <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-3">dd</div>
                <div class="col-sm-6 col-md-3 col-lg-3">dd</div>
                <div class="col-sm-6 col-md-3 col-lg-3">dd</div>
                <div class="col-sm-6 col-md-3 col-lg-3">dd</div>
              </div>
           </form> --}}
     
    <div class="table-responsive">

        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Libellé</th>
                        <th>Date d'achat</th>			
                        <th>Montant</th>
                        <th>Fournisseur</th>
                        <th>Agent</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($achats as $value)
                       <tr>
                        <td>{{++$i}}</td>
                        <td>{{$value->libellé}}</td>
                        <td>{{$value->date_achat}}</td>
                        <td>{{$value->montant_total}} DH</td> 
                        <td>{{$value->fournisseur}}</td>  
                        <td>{{$value->agent}}</td>            
                    </tr>
                  @endforeach
                   
                    
                </tbody>
            </table>
            
        </div>
        <div class="d-flex justify-content-center">
            {!! $achats->links() !!}
        </div>
    </div>
</div>     

@endsection


