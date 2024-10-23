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
            <form action="" method="GET">
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
                      <th>Selling Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody >
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
            <input type="text" class="form-control" id="no_jobcard" name="no_jobcard" required>
          </div>
          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
          </div>
          <div class="form-group">
            <label for="kurs">Kurs</label>
            <input type="number" class="form-control" id="kurs" name="kurs" required>
          </div>
          <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
          </div>
          <div class="form-group">
            <label for="no_po">PO Number</label>
            <input type="text" class="form-control" id="no_po" name="no_po" required>
          </div>
          <div class="form-group">
            <label for="po_date">PO Date</label>
            <input type="date" class="form-control" id="po_date" name="po_date" required>
          </div>
          <div class="form-group">
            <label for="po_received">PO Received Date</label>
            <input type="date" class="form-control" id="po_received" name="po_received" required>
          </div>
          <div class="form-group">
            <label for="totalbop">Total BOP</label>
            <input type="number" class="form-control" id="totalbop" name="totalbop" required>
          </div>
          <div class="form-group">
            <label for="totalsp">Total SP</label>
            <input type="number" class="form-control" id="totalsp" name="totalsp" required>
          </div>
          <div class="form-group">
            <label for="totalbp">Total BP</label>
            <input type="number" class="form-control" id="totalbp" name="totalbp" required>
          </div>
          <div class="form-group">
            <label for="no_form">Form Number</label>
            <input type="text" class="form-control" id="no_form" name="no_form" required>
          </div>
          <div class="form-group">
            <label for="effective_date">Effective Date</label>
            <input type="date" class="form-control" id="effective_date" name="effective_date" required>
          </div>
          <div class="form-group">
            <label for="no_revisi">Revision Number</label>
            <input type="number" class="form-control" id="no_revisi" name="no_revisi" required>
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

<!-- Add Material Modal -->
<div class="modal fade" id="addMaterialModal" tabindex="-1" role="dialog" aria-labelledby="addMaterialModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addMaterialModalLabel">Add Material</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="" method="POST">
              @csrf
              <div class="modal-body">
                  <div class="form-group">
                      <label for="qty">Quantity</label>
                      <input type="number" class="form-control" id="qty" name="qty" required>
                  </div>
                  <div class="form-group">
                      <label for="unit_bop">Unit BOP</label>
                      <input type="number" class="form-control" id="unit_bop" name="unit_bop" required>
                  </div>
                  <div class="form-group">
                      <label for="total_bop">Total BOP</label>
                      <input type="number" class="form-control" id="total_bop" name="total_bop" required>
                  </div>
                  <div class="form-group">
                      <label for="unit_sp">Unit SP</label>
                      <input type="number" class="form-control" id="unit_sp" name="unit_sp" required>
                  </div>
                  <div class="form-group">
                      <label for="total_sp">Total SP</label>
                      <input type="number" class="form-control" id="total_sp" name="total_sp" required>
                  </div>
                  <div class="form-group">
                      <label for="unit_bp">Unit BP</label>
                      <input type="number" class="form-control" id="unit_bp" name="unit_bp" required>
                  </div>
                  <div class="form-group">
                      <label for="total_bp">Total BP</label>
                      <input type="number" class="form-control" id="total_bp" name="total_bp" required>
                  </div>
                  <div class="form-group">
                      <label for="remarks">Remarks</label>
                      <input type="text" class="form-control" id="remarks" name="remarks">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save Material</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
