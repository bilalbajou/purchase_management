@extends('layouts.admin2')

@section('page_title')
Agent
@endsection
@section('content')
<div class="container-xl">
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
                        <td>{{$value->id_achat}}</td>
                        <td>{{$value->libellé}}</td>
                        <td>{{$value->date_achat}}</td>
                        <td>{{$value->montant_total}}</td> 
                        <td>{{$value->fournisseur}}</td>  
                        <td>{{$value->agent}}</td>            
                    </tr>
                  @endforeach
                   
                    
                </tbody>
            </table>
         
        </div>
    </div>
</div>     

@endsection


