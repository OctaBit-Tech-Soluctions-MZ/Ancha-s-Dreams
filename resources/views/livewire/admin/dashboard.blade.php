<div>
    <div class="row">
        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-award text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ $courses }}</span></h3>
            <p class="text-muted font-15 mb-0">Cursos Registados</p>
        </x-ancha-dreams-taste.card-dashboard>
        
        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-book text-muted" style="font-size: 24px;"></i>
            <h3><span> {{$books}} </span></h3>
            <p class="text-muted font-15 mb-0">Livros Registados</p>            
        </x-ancha-dreams-taste.card-dashboard>
        
        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-users-alt text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ $users }}</span></h3>
            <p class="text-muted font-15 mb-0">Utilizadores</p>            
        </x-ancha-dreams-taste.card-dashboard>

        <x-ancha-dreams-taste.card-dashboard>
            <i class="uil-package text-muted" style="font-size: 24px;"></i>
            <h3><span>{{ $orders }}</span></h3>
            <p class="text-muted font-15 mb-0">Pedidos Pendentes</p>  
        </x-ancha-dreams-taste.card-dashboard>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Status de Pedidos</h4>

                    <div class="my-4 chartjs-chart" style="height: 202px;">
                        <canvas id="project-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
                    </div>

                    <div class="row text-center mt-2 py-2">
                        <div class="col-4">
                            <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                            <h3 class="fw-normal">
                                <span>64%</span>
                            </h3>
                            <p class="text-muted mb-0">Completo</p>
                        </div>
                        <div class="col-4">
                            <i class="mdi mdi-trending-down text-primary mt-3 h3"></i>
                            <h3 class="fw-normal">
                                <span>26%</span>
                            </h3>
                            <p class="text-muted mb-0"> Pendente</p>
                        </div>
                        <div class="col-4">
                            <i class="mdi mdi-trending-down text-danger mt-3 h3"></i>
                            <h3 class="fw-normal">
                                <span>10%</span>
                            </h3>
                            <p class="text-muted mb-0"> Cancelado</p>
                        </div>
                    </div>
                    <!-- end row-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Pedidos</h4>

                    <p><b>107</b> Tasks completed out of 195</p>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body">Coffee detail page - Main Page</a></h5>
                                        <span class="text-muted font-13">Due in 3 days</span>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Status</span> <br>
                                        <span class="badge badge-warning-lighten">In-progress</span>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Feito Por</span>
                                        <h5 class="font-14 mt-1 fw-normal">Logan R. Cohn</h5>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Total time spend</span>
                                        <h5 class="font-14 mt-1 fw-normal">3h 20min</h5>
                                    </td>
                                    <td class="table-action" style="width: 90px;">
                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body">Drinking bottle graphics</a></h5>
                                        <span class="text-muted font-13">Due in 27 days</span>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Status</span> <br>
                                        <span class="badge badge-danger-lighten">Outdated</span>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Assigned to</span>
                                        <h5 class="font-14 mt-1 fw-normal">Jerry F. Powell</h5>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Total time spend</span>
                                        <h5 class="font-14 mt-1 fw-normal">12h 21min</h5>
                                    </td>
                                    <td class="table-action" style="width: 90px;">
                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body">App design and development</a></h5>
                                        <span class="text-muted font-13">Due in 7 days</span>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Status</span> <br>
                                        <span class="badge badge-success-lighten">Completed</span>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Assigned to</span>
                                        <h5 class="font-14 mt-1 fw-normal">Scot M. Smith</h5>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Total time spend</span>
                                        <h5 class="font-14 mt-1 fw-normal">78h 05min</h5>
                                    </td>
                                    <td class="table-action" style="width: 90px;">
                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body">Poster illustation design</a></h5>
                                        <span class="text-muted font-13">Due in 5 days</span>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Status</span> <br>
                                        <span class="badge badge-warning-lighten">In-progress</span>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Assigned to</span>
                                        <h5 class="font-14 mt-1 fw-normal">John P. Ritter</h5>
                                    </td>
                                    <td>
                                        <span class="text-muted font-13">Total time spend</span>
                                        <h5 class="font-14 mt-1 fw-normal">26h 58min</h5>
                                    </td>
                                    <td class="table-action" style="width: 90px;">
                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                        <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
</div>