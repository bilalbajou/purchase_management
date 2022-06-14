@extends('layouts.admin2')

@section('page_title')
  Fournisseurs
@endsection
@section('content')
<div class="container-xl">
    <div class="table-responsive">

        <div class="table-wrapper">
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Nom</th>
                        <th>Adresse</th>			
                        <th>Telephone</th>
                        <th>Libellé</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($frns as $value)
                       <tr class="text-center">
                        <td>{{++$i}}</td>
                        <td>{{$value->nom}}</td>
                        <td>{{$value->adresse}}</td>
                        <td>{{$value->telephone}}</td> 
                        <td>{{$value->libellé}}</td>  
                        <td>{{$value->montant_total}}</td>            
                    </tr>
                  @endforeach
                   
                    
                </tbody>
            </table>
         
        </div>
        <div class="d-flex justify-content-center">
            {!! $frns->links() !!}
        </div>
    </div>
</div>     

@endsection


