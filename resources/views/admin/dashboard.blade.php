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
                                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{$montant_achats->montant}} DH</div>
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
                                              {{Date('D')}} {{Date('y/m/d')}} </div>
                                        <div class="h3 mb-0 font-weight-bold text-gray-800"><p class="h4" id="horloge"></p></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clock fa-2x text-gray-300"></i>
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
                                <th class="text-center">#</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prénom</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Nombre d'achats</th>
                                <th class="text-center">Montant Global</th>
                              </tr>
                            </thead>
                            <tbody>
                               @foreach ($agents as $item)
                                   <tr>
                                       <td class="text-center">{{++$i}}</td>
                                       <td class="text-center">{{$item->name}}</td>
                                       <td class="text-center">{{$item->first_name}}</td>
                                       <td class="text-center">{{$item->email}}</td>
                                       <td class="text-center">{{$item->nb_achats}}</td>
                                       <td class="text-center">{{$item->mt_achats}} DH</td>
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
                              <tr class="text-center">
                                <th class="text-center">#</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Adresse</th>
                                <th class="text-center">Nombre d'achats</th>
                                <th class="text-center">Montant Global</th>
                              </tr>
                            </thead>
                            <tbody>
                               @foreach ($frns as $item)
                                    <tr class="text-center">
                                         <td class="text-center">{{++$j}}</td>
                                         <td class="text-center">{{$item->nom}}</td>
                                         <td class="text-center">{{$item->adresse}}</td>
                                         <td class="text-center">{{$item->nb_achats}}</td>
                                         <td class="text-center">{{$item->mt_achats}} DH</td>
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