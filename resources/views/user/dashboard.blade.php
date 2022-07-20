@extends('user.layouts.app')
@prepend('meta-data')
    <meta name="data" content="{{ $data }}" />
@endprepend
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Accomplishments</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Calendar</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="d-grid mb-4">
                                    <button class="btn btn-lg font-16 btn-success" id="print-summary"><i
                                        class="mdi mdi-printer"></i> Print Accomplishment
                                    </button>
                                </div>
                                <div class="card">
                                    <div class="card-body border-secondary border">
                                        <h4 >ACCOMPLISHMENT SUMMARY</h4>
                                        <hr >
                                        <table class="table table-hovered bg-light" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle" width="80%">Service Category</th>
                                                    <th class="text-center align-middle" width="20%">No of Services</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($summary as $sum)
                                                    <tr>
                                                        <td class="align-middle">{{ $sum->description }}</td>
                                                        <td class="text-center align-middle">{{ $sum->services }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="align-middle">Total Services Delivered</th>
                                                    <th class="text-center align-middle">{{ $countAccomplishment }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-9">
                                <div class="mt-4 mt-lg-0">
                                    <div id="calendar"></div>
                                </div>
                            </div> <!-- end col -->

                        </div> <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->

                <!-- Add New Event MODAL -->
                <div class="modal fade" id="event-modal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                @csrf
                                <div class="modal-header py-3 px-4 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Accomplishment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Control #</label>
                                                <input class="form-control" type="hidden" name="username" id="username"  value="{{ $username }}"/>
                                                <input class="form-control" type="hidden" name="user_id" id="user_id"  value="{{ $userID }}"/>
                                                <input class="form-control" type="text" name="control_no" id="control_no" readonly />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Office</label>
                                                <input class="form-control text-uppercase" placeholder="Input Office" type="text" name="office" id="office" required autocomplete="off"/>
                                                <span class="text-danger" id="office-error-message"></span>
                                            </div>
                                        </div>  
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Date of Request</label>
                                                <input class="form-control" type="date" name="request_date" id="request_date" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Time of Request</label>
                                                <input class="form-control" type="time" name="request_time" id="request_time" required autocomplete="off">
                                                <span class="text-danger" id="request_time-error-message"></span>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Date Acted</label>
                                                <input class="form-control" type="date" name="date_acted" id="date_acted" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Time Acted</label>
                                                <input class="form-control" type="time" name="time_acted" id="time_acted" required autocomplete="off">
                                                <span class="text-danger" id="time_acted-error-message"></span>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Date Completed</label>
                                                <input class="form-control" type="date" name="date_completed" id="date_completed" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Time Completed</label>
                                                <input class="form-control" type="time" name="time_completed" id="time_completed" required autocomplete="off">
                                                <span class="text-danger" id="time_completed-error-message"></span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Service Category</label>
                                                <select class='form-select' id='category' name="category" required>
                                                    <option value="" readonly disabled selected>Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->description }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger" id="category-error-message"></span>
                                            </div>
                                        </div>  

                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Problem/Request Description</label>
                                                <input class="form-control text-uppercase" placeholder="Input Request" type="text" name="problem" id="problem" required autocomplete="off"/>
                                                <span class="text-danger" id="problem-error-message"></span>
                                            </div>
                                        </div>  
                                        
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Result/Recommendation</label>
                                                <input class="form-control text-uppercase" placeholder="Input Recommendation" type="text" name="solution" id="solution" required autocomplete="off"/>
                                                <span class="text-danger" id="solution-error-message"></span>
                                            </div>
                                        </div> 

                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Requested By</label>
                                                <input class="form-control text-uppercase" placeholder="Input Name" type="text" name="requested_by" id="requested_by" required autocomplete="off"/>
                                                <span class="text-danger" id="requested_by-error-message"></span>
                                            </div>
                                        </div> 

                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label class="control-label form-label">Approved By</label>
                                                <input class="form-control text-uppercase" placeholder="Input Name" type="text" name="approved_by" id="approved_by" required autocomplete="off"/>
                                                <span class="text-danger" id="approved_by-error-message"></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-1">
                                            <button type="button" class="btn btn-primary" id="btn-print-event">Print</button>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check m-2 mt-1">
                                                <input type="checkbox" class="form-check-input" id="blank_signatory">
                                                <label class="form-check-label" for="blank_signatory">Blank Signatory</label>
                                            </div>
                                        </div>
                                        <div class="col-5 text-end">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                            <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->


                <!-- Add New Event MODAL -->
                <div class="modal fade" id="print-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form class="needs-validation" name="event-form" id="form-print" novalidate>
                                @csrf
                                <div class="modal-header py-3 px-4 border-bottom-0">
                                    <h5 class="modal-title" id="modal-title">Print Accomplishment Summary</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label for="print-from" class="form-label">From</label>
                                                <input class="form-control" id="print-from" type="month" name="print-from" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label for="print-to" class="form-label">To</label>
                                                <input class="form-control" id="print-to" type="month" name="print-to" required>
                                            </div>
                                        </div>
                                        <div class="d-grid mt-2">
                                            <button type="button" class="btn btn-lg font-16 btn-success" id="print-now" data-user="{{ $userID }}"><i
                                                class="mdi mdi-printer"></i> Print Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->
            </div>
            <!-- end col-12 -->
        </div> <!-- end row -->

    </div> <!-- container -->
@endsection
@push('page-scripts')
    <script src="{{ asset ('assets/js/calendar1.js') }}"></script>
    
@endpush
    
