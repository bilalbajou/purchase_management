@extends('layouts.admin2')

@section('page_title')
Tableau du board
@endsection

@section('content')
       <div class="container">
            <div class="row">
                     <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="card border-left-primary shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Nombre des achats </div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{$nb_achats}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Montant des achats </div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800">3332 DH</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                     </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-80 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Nombre des Fournisseurs</div>
                                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{$nb_frns}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     </div>
                     <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card border-left-primary shadow h-80 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            {{$wheather['location']['city']}} <br> {{Date('D')}} {{Date('y/m/d')}} </div>
                                        <div class="h3 mb-0 font-weight-bold text-gray-800">{{$wheather['current_observation']['atmosphere']['humidity']}}</div>
                                    </div>
                                    <div class="col-auto">
                                        @if(($wheather_text=="Sunny") OR ($wheather_text="Mostly Sunny"))
                                        <i class="far fa-sun fa-2x text-gray-300"></i>
                                         @elseif(($wheather_text=='Mostly Cloudy')OR($wheather_text=="Partly Cloudy"))
                                         <i class="fas fa-cloud-sun fa-2x text-gray-300"></i>
                                         @elseif(($wheather_text=="Thunderstorms")OR($wheather_text=="Thunderstorms"))
                                         <i class="fas fa-cloud-showers-heavy fa-2x text-gray-300"></i>
                                         @elseif($wheather_text=="Rain")
                                         <i class="fas fa-cloud-showers-heavy fa-2x text-gray-300"></i> 
                                         @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>

            </div>
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Agent</h4>
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Nombre d'achats</th>
                                <th>Montant Global</th>
                              </tr>
                            </thead>
                            <tbody>
                               @foreach ($agents as $item)
                                   <tr>
                                       <td>{{$item->id}}</td>
                                       <td>{{$item->name}}</td>
                                       <td>{{$item->first_name}}</td>
                                       <td>{{$item->email}}</td>
                                       <td>{{$item->nb_achats}}</td>
                                       <td>{{$item->mt_achats}}</td>
                                   </tr>
                               @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Fournisseurs</h4>
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Nombre d'achats</th>
                                <th>Montant Global</th>
                              </tr>
                            </thead>
                            <tbody>
                               @foreach ($frns as $item)
                                    <tr>
                                         <td>{{$item->id_frn}}</td>
                                         <td>{{$item->nom}}</td>
                                         <td>{{$item->adresse}}</td>
                                         <td>{{$item->nb_achats}}</td>
                                         <td>{{$item->mt_achats}}</td>
                                    </tr>
                               @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
       </div>
@endsection