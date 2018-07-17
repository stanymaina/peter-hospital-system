@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Patient</li>
        </ol>
        @include('inc.message')
        <!-- Example DataTables Card-->

        <div class="col-12 mb-4">
          <button onclick="load_add_patient()" class="btn btn-primary" data-target="#hire-modal" data-toggle="modal">
                  Add Patient
          </button>
        </div>
        <script>
            function load_add_patient(){
                $('#patient-alter').load('/patients/create');
            }
            function load_edit_patient(id){
                $('#patient-alter').load('/patients/'+id+'/edit');
            }
        </script>
        <div class="modal" id="hire-modal" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div id="patient-alter">
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Data Table Example</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Patient Name</th>
                      <th>Patient ID</th>
                      <th>Patient Phone</th>
                      <th>Next Kin Name</th>
                      <th>Next Kin Phone</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Patient Name</th>
                      <th>Patient ID</th>
                      <th>Patient Phone</th>
                      <th>Next Kin Name</th>
                      <th>Next Kin Phone</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->surname}} {{$patient->other_names}}</td>
                            <td>{{$patient->id_number}}</td>
                            <td>{{$patient->phone_number}}</td>
                            <td>{{$patient->next_kin_name}}</td>
                            <td>{{$patient->kin_phone_number}}</td>
                            <td>
                                <a class="btn btn-primary" onclick="load_edit_hire({{$patient->id}})" data-target="#hire-modal" data-toggle="modal"><i class="fa fa-edit"></i></a>
                                {{-- <a class="btn btn-primary" href="/patients/{{$patient->id}}/edit"><i class="fa fa-edit"></i></a> --}}
                                <a class="btn btn-primary" onclick="load_delete_patient({{$patient->id}})" data-target="#hire-modal" data-toggle="modal"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
    <!-- /.container -->
@endsection
