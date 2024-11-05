@extends('layout.pegawai.main')

@section('title')
    @if (Auth::user()->role == 0)
    Job Card || Admin
    @elseif (Auth::user()->role == 1)
    Job Card || Pegawai
    @endif
@endsection

@section('pages')
Job Card
@endsection

@section('content')
<div class="container-fluid mt-0">
    <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="d-flex justify-content-between mb-3">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobCardModal">Add New Job Card</a>
            <form action="{{route('admin.jobcard')}}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </form>
          </div>
        
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Total Job Cards</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">30 done</span> this month
                  </p>
                </div>
                <div class="col-lg-6 col-5 text-end">
                  <div class="dropdown">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item" href="javascript:;">Month</a></li>
                      <li><a class="dropdown-item" href="javascript:;">Year</a></li>
                      <li><a class="dropdown-item" href="javascript:;">All</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table  mb-0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>JC Number</th>
                      <th>Date</th>
                      <th>Customer</th>
                      <th>Total Material</th>
                      {{-- <th>Selling Price</th> --}}
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody >
                    <!-- Loop through job cards -->
                  @foreach($jobCards as $jobCard)
                    <tr >
                      <td>&nbsp;&nbsp;&nbsp;&nbsp; {{ $loop->iteration }}</td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $jobCard->no_jobcard }}</td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $jobCard->date }}</td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $jobCard->customer_name }}</td>
                      <td>&nbsp;&nbsp;&nbsp;&nbsp;
                      @php
                        $total = \App\Models\JobcardDetailM::where('jobcard_id', $jobCard->id)->count();
                      @endphp
                      {{$total}}
                      </td>
                      {{-- <td>&nbsp;&nbsp;&nbsp;&nbsp;{{ $jobCard->totalbp }}</td> --}}
                      <td>&nbsp;&nbsp;&nbsp;&nbsp; 
                        <div style="margin-top: -25px" class="d-flex justify-content-center">
                          <a href="{{route('admin.jobcard.detail.add',$jobCard->id)}}" class="mx-2" >
                            <i class="material-icons text-success">add</i>
                        </a>

                          <a href="{{ route('admin.jobcard.edit', $jobCard->id) }}" class="mx-2">
                              <i class="material-icons text-warning">edit</i>
                          </a>
                          <!-- View Icon Trigger for Modal -->
                          <a href="#" class="mx-2" data-bs-toggle="modal" data-bs-target="#viewModal{{ $jobCard->id }}">
                            <i class="material-icons text-success">visibility</i>
                          </a>

                          <!-- View Job Card Modal -->
                          <div class="ml-4 modal fade" id="viewModal{{ $jobCard->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $jobCard->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <!-- Modal Header with Title -->
                                    <div class="modal-header bg-primary text-white">
                                      @php
                                        $job = \App\Models\JobCardM::find($jobCard->id);
                                      @endphp
                                        <h5 class="modal-title" id="viewModalLabel{{ $jobCard->id }}" style="color: white">Job Card Details - {{ $job->no_jobcard }}</h5> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="" class="mt-2 btn btn-white"><i class="ml-3 material-icons text-black">print</i></a>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    
                                    <!-- Modal Body with Professional Layout -->
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- Job Card Summary Section -->
                                                <h6 class="text-muted mb-3"><center>Job Card</center></h6>
                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <strong>JC No : </strong> {{ $job->no_jobcard }} <br>
                                                        <strong>Date : </strong> {{ $job->date }} <br>
                                                        <strong>kurs : </strong> {{ $job->kurs }} <br>
                                                    </div>
                                                    <div class="col-md-6 text-end">
                                                        <strong>Customer Name : </strong> {{ $job->customer_name }} <br>
                                                        <strong>PO No : </strong> {{ $job->customer_name }} <br>
                                                        <strong>PO Date : </strong> {{ $job->po_date }} <br>
                                                        <strong>PO Received : </strong> {{ $job->po_received }} <br>
                                                    </div>
                                                </div>

                                                <!-- Pricing Section -->
                                                <h6 class="text-muted mb-3">Detail</h6>
                                                <div class="table-responsive">
                                                  <table class="table table-striped">
                                                      <thead>
                                                          <tr>
                                                              <th rowspan="2">NO</th>
                                                              <th rowspan="2">Qty</th>
                                                              <th rowspan="2">Description</th>
                                                              <th colspan="2">Bottom Price</th>
                                                              <th colspan="2">Selling Price</th>
                                                              <th colspan="3">Buying Price</th>
                                                              <th rowspan="2">Remarks <br> Delivery Time</th>
                                                          </tr>
                                                          <tr>
                                                              <th>Unit Price</th>
                                                              <th>Total</th>
                                                              <th>Unit Price</th>
                                                              <th>Total</th>
                                                              <th>Unit Price</th>
                                                              <th>Total</th>
                                                              <th>Supplier</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                        @php
                                                          $data = \App\Models\JobCardDetailM::where('jobcard_id',$job->id)->get();
                                                          // dd($job->id);
                                                        @endphp
                                                        @foreach ($data as $d)
                                                          
                                                        
                                                          <tr>
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$loop->iteration}}</td> <!-- NO -->
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$d->qty}}</td> <!-- Qty -->
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$d->description}}</td> <!-- Description -->
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;Rp. {{$d->unit_bop}}</td> <!-- Bottom Price Unit Price -->
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;Rp. {{$d->total_bop}}</td> <!-- Bottom Price Total -->
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;Rp. {{$d->unit_sp}}</td> <!-- Selling Price Unit Price -->
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;Rp. {{$d->total_sp}}</td> <!-- Selling Price Total -->
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;Rp. {{$d->unit_bp}}</td> <!-- Buying Price Unit Price -->
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;Rp. {{$d->total_bp}}</td> <!-- Buying Price Total -->
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$d->supplier}}</td> <!-- Buying Price Supplier -->
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$d->remarks}}</td> <!-- Remarks/Delivery Time -->
                                                          </tr>
                                                        @endforeach
                                                            <tr>
                                                              <td colspan="3" class="text-end">&nbsp;&nbsp;&nbsp;&nbsp;Total In Rupiah</td>
                                                              <td class="text-end">&nbsp;&nbsp;&nbsp;&nbsp;Rp</td>
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$job->totalbop}}</td>
                                                              <td class="text-end">&nbsp;&nbsp;&nbsp;&nbsp;Rp</td>
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$job->totalsp}}</td>
                                                              <td class="text-end">&nbsp;&nbsp;&nbsp;&nbsp;Rp</td>
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$job->totalbp}}</td>
                                                            </tr>
                                                            <tr>
                                                              <td colspan="3" class="text-end">&nbsp;&nbsp;&nbsp;&nbsp;Total In USD</td>
                                                              <td class="text-end">&nbsp;&nbsp;&nbsp;&nbsp;$</td>
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$job->totalbop}}</td>
                                                              <td class="text-end">&nbsp;&nbsp;&nbsp;&nbsp;$</td>
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$job->totalsp}}</td>
                                                              <td class="text-end">&nbsp;&nbsp;&nbsp;&nbsp;$</td>
                                                              <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$job->totalbp}}</td>
                                                            </tr>
                                                            
                                                          <!-- Additional rows as needed -->
                                                      </tbody>
                                                  </table>
                                              </div>
                                              

                                                <!-- Supplier Information Section -->
                                                <div class="row mt-2">
                                                    <div class="col-md-12 text-end">
                                                        <strong>No Form:</strong> {{ $job->no_form }} <br>
                                                        <strong>Effective Date:</strong> {{ $job->effective_date }} <br>
                                                        <strong>No Revisi:</strong> {{ $job->no_revisi }} <br>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Footer with Close Button -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                          </div>

                                  
                            <!-- Delete Button with Modal Trigger -->
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal{{$jobCard->id}}">
                              <i class="material-icons text-danger">delete</i>
                            </a>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteModal{{$jobCard->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$jobCard->id}}" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="deleteModalLabel{{$jobCard->id}}">Confirm Delete</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          Are you sure you want to delete this job card?
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                          <form action="{{ route('admin.jobcard.destroy', $jobCard->id) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-danger">Delete</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                            </div>
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

        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Orders Overview</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">24%</span> this month
              </p>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <!-- Orders timeline -->
                @foreach($orders as $order)
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="material-icons text-{{ $order->icon_color }}">{{ $order->icon }}</i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold">{{ $order->title }}</h6>
                    <p class="text-secondary font-weight-bold text-xs">{{ $order->date }}</p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

<!-- Add Job Card Modal -->
<div class="modal fade" id="addJobCardModal" tabindex="-1" role="dialog" aria-labelledby="addJobCardModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addJobCardModalLabel">Add New Job Card</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.jobcard.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="no_jobcard">Job Card Number</label>
            <input type="text" class="form-control" id="no_jobcard" style="outline: 1px solid #007bff;" name="no_jobcard" required>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" style="outline: 1px solid #007bff;" name="date" required>
          </div>
          <div class="form-group">
            <label for="kurs">Kurs</label>
            <input type="number" class="form-control" id="kurs" style="outline: 1px solid #007bff;" name="kurs" required>
          </div>
          <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" style="outline: 1px solid #007bff;" name="customer_name" required>
          </div>
          <div class="form-group">
            <label for="no_po">PO Number</label>
            <input type="text" class="form-control" id="no_po" style="outline: 1px solid #007bff;" name="no_po" required>
          </div>
          <div class="form-group">
            <label for="po_date">PO Date</label>
            <input type="date" class="form-control" id="po_date" name="po_date" style="outline: 1px solid #007bff;" required>
          </div>
          <div class="form-group">
            <label for="po_received">PO Received Date</label>
            <input type="date" class="form-control" id="po_received" name="po_received" required style="outline: 1px solid #007bff;">

          </div>
          
          <div class="form-group">
            <label for="no_form">Form Number</label>
            <input type="text" class="form-control" id="no_form" style="outline: 1px solid #007bff;" name="no_form" required>
          </div>
          <div class="form-group">
            <label for="effective_date">Effective Date</label>
            <input type="date" class="form-control" id="effective_date" style="outline: 1px solid #007bff;" name="effective_date" required>
          </div>
          <div class="form-group">
            <label for="no_revisi">Revision Number</label>
            <input type="number" class="form-control" id="no_revisi" style="outline: 1px solid #007bff;" name="no_revisi" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Job Card</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection
