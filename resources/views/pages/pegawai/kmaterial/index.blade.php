@extends('layout.pegawai.main')
@section('title')
    Kelola Material || {{Auth::user()->name}}
@endsection
@section('pages')
Kelola Material
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table  mb-0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>JC Number</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Selling Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody >
                    @php
                        $jobCards = [];
                    @endphp
                  <!-- Loop through job cards -->
                  @foreach($jobCards as $index => $jobCard)
                  <tr >
                    <td>&nbsp;&nbsp;&nbsp;&nbsp; {{ $index + 1 }}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $jobCard->no_jobcard }}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $jobCard->date }}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $jobCard->customer_name }}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $jobCard->totalbp }}</td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;
                      <div style="margin-top: -25px" class="d-flex justify-content-center">
                        <a href="#" class="mx-2" data-bs-toggle="modal"  data-bs-target="#addMaterialModal">
                          <i class="material-icons text-success">add</i>
                        </a>
                        <a href="{{ route('admin.jobcard.edit', $jobCard->id) }}" class="mx-2">
                            <i class="material-icons text-warning">edit</i>
                        </a>
                        <a href="{{ route('admin.jobcard.show', $jobCard->id) }}" class="mx-2">
                            <i class="material-icons text-success">visibility</i>
                        </a>
                        <form  action="{{ route('admin.jobcard.destroy', $jobCard->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="mx-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link p-0" style="border: none; background: none;">
                                <i class="material-icons text-danger">delete</i>
                            </button>
                        </form>
                    </div>
                    
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection