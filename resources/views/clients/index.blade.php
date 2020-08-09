@extends('layouts.main')
@section('datatable_styles')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
 <div class="row">
     <div class="col-md-12">
         @include('partials._messages')
         <div class="card card-primary">
             <div class="card-header">
                 <h5 class="card-title">
                     Clients <div class="badge badge-info">
                         {{ $clients->count() }}
                    </div>
                 </h5>
                 <div class="card-tools">
                 <a href="{{ route('clients.create')}}" class="btn btn-info btn-sm">
                        <i class="fas fa-user-plus"></i> Add Client
                    </a>
                 </div>
             </div>
             <div class="card-body">
                 <table class="table table-bordered table-striped" id="example1">
                     <thead>
                         <tr>
                             <th>Firstname</th>
                             <th>Lastname</th>
                             <th>Email</th>
                             <th>Phone</th>
                             <th>Created</th>
                             <th>Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse ($clients as $client)
                            <tr>
                            <td>{{ $client->firstname }}</td>
                            <td>{{ $client->lastname }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('clients.show', $client)}}" class="btn btn-xs btn-outline-info">
                                <i class="fas fa-eye"></i>
                            </a>
                                <a href="{{ route('clients.edit', $client)}}" class="btn btn-xs btn-outline-warning">
                                <i class="fas fa-edit"></i></a></td>
                            </tr>
                         @empty
                            <tr>
                                <td colspan="4">No Records Yet</td>
                            </tr>
                         @endforelse
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
@endsection
@section('datatable_scripts')
    <!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}" defer></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}" defer></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}" defer></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}" defer></script>
<script src="{{ asset('js/demo.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
