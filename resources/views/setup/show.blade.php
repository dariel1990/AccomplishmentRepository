@extends('admin.layouts.app')


@section('content')

    <div class="container-fluid mt-4">

        <div class="row col-lg-12 col-md-12">
            

            <div class="card col-lg-6 col-md-6 col-sm-12 p-2" >
                <h4>Category</h4> 
                <select class="form-select" aria-label="Default select example" id="category">
                    <option value="selected">All</option>
                    <option value="strategic_prio">Strategic Priorities</option>
                    <option value="core_function">Core Function</option>
                    <option value="support_services">Support Services</option>
                </select>

                <div class="card-body" hidden>
                    

                    <div class="mt-2">
                        <label for="exampleFormControlTextarea1" class="form-label">Particular</label>
                        <textarea class="form-control" id="mfo_desc" rows="3"></textarea>
                    </div>
                    <div class="">
                        <input type="text" id="office_code" value="10044" hidden>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-4">
                            <label for="">Seq. No</label>
                            <input type="text" class="form-control form-control-xs" id="seq_no">
                        </div>

                        <div class="col-lg-8 mt-3">
                            <label></label>
                            <button class="btn btn-md btn-success float-end" id="btnSet">Submit</button>
                        </div>
                    </div>

                    <div class="mt-2" id="task"></div>
                </div>        
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12" id="main-output">
                @foreach ($data as $d)
                <div class="card">
                    <div class="card-body" id="subTaskDesc">
                        <h4>{{ $d->category }}</h4>
                        <p>{{ $d->seq_no }}. &nbsp; {{ $d->mfo_desc }}</p>
                        <a href="" class="btn btn-sm btn-info" btn-id="sub_task" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Sub-Task</a>
                    </div>
                </div>
                @endforeach
            </div>

                    
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-target="modal">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">SUB-TASK</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4>{{ $subtask->mfo_id }}</h4>
                            <div class="mt-2">
                                <label for="">Seq No.</label>
                                <input type="text" class="form-control form-control-sm mb-1" style="width: 30%">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Save changes</button>
                        </div>
                    </div>
                    </div>
                </div>    
            

        </div>

    </div>

@endsection


@push('page-scripts')
    <script>

            document.querySelector('click', function() {
                let subTarget = e.target.getAttribute('data-target');

                if(subTarget && subTarget.includes('modal'))
                {
                    console.log('this is the modal id');
                }
            });



            document.addEventListener('click', function(e) {
                let mfoID = e.target.getAttribute('data-bs-target');
                
                if(mfoID && mfoID.includes('exampleModal'));
                {
                    let index = document.querySelectorAll('#button').length;
                    let dataIndex = document.querySelectorAll('#button')[index - 1];
                    let noElements = dataIndex.childNodes.length;
                    console.log(noElements)
                }
            });


            $('#category').change(function() {
                document.querySelector('.card-body').removeAttribute('hidden')
            });


            document.addEventListener('click', function(e) {
                let btnModal = e.target.getAttribute('btn-id');
                let index = 0;

                if(btnModal && btnModal.includes('sub_task'))
                {
                    console.log(document.querySelector('.modal'));
                }
            });


            // Set target button
            $('#btnSet').click((e) => {
                e.preventDefault();
                                    
                let output = document.querySelector('#main-output');
                let descripNode = document.createElement('div');

                let mfo_desc = $('#mfo_desc').val();
                let office_code = $('#office_code').val();
                let category = $('#category').val();
                let seq_no = $('#seq_no').val();


                $.ajax({
                    method: 'POST',
                    url: '/setup-store',
                    data: {
                        office_code: office_code,
                        category: category,
                        mfo_desc: mfo_desc,
                        seq_no: seq_no
                    },
                    success: function (response) {

                    }
                });

                // descripNode.innerHTML = `<div class="card p-4">
                //                             <div class="accordion accordion-flush" id="accordionFlushExample">
                //                                 <div class="accordion-item">
                //                                     <h2 class="accordion-header" id="flush-headingOne">
                //                                     <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background: #e2daeb">${seqVal}. &nbsp; ${taskVal}
                //                                     </button>
                //                                     </h2>
                //                                 <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                //                                 <div class="accordion-body">${descripNode}</div>
                //                                 </div>
                //                                 </div>
                //                             </div>
                //                         </div>`;

                // output.append(descripNode);
            
                location.reload();
                
            });
         


            // sub-task button
            // document.addEventListener('click', function(e) {

            //     let btnAtt = e.target.getAttribute('data-index');

            //     if(btnAtt && btnAtt.includes('task')) {

            //         let descripNode = document.createElement('div');

            //         let taskVal = $('#mainTaskDesc').val();
            //         let seqVal = $('#seq_no').val();

            //         descripNode.innerHTML = `<div class="card">
            //                                     <div class="accordion accordion-flush" id="accordionFlushExample">
            //                                         <div class="accordion-item">
            //                                             <h2 class="accordion-header" id="flush-headingOne">
            //                                             <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background: #e2daeb; font-size: 20px">${seqVal}. &nbsp; ${taskVal}
            //                                             </button>
            //                                             </h2>

            //                                             <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            //                                                 <div class="accordion-body">${descripNode}</div>
            //                                             </div>
            //                                         </div>
            //                                     </div>
            //                                 </div>`;

            //         document.querySelector('#sub_task').append(descripNode);
                    

            //     }
            // });



            // submit button
            document.addEventListener('click', function(e) {
                let submitAttr = e.target.getAttribute('data-key');

                if(submitAttr && submitAttr.includes('submit'))
                {
                    let category = document.getElementById('category').value;
                    let subTask = document.querySelector('#subDesc').value;
                    


                    document.querySelector('#main-output').innerHTML = `<div class="card">
                                                                            <div class="card-body">
                                                                                <button class="btn btn-sm btn-danger" data-id="btnDelete">Remove</button>
                                                                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                                                                    <div class="accordion-item">
                                                                                        <h2 class="accordion-header" id="flush-headingOne">
                                                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background: #e2daeb; font-size: 20px">
                                                                                            ${subData}
                                                                                        </button>
                                                                                        </h2>
                                                                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                                                        <div class="accordion-body">${subData}</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>`;

                }

            });



            // remove button
            document.addEventListener('click', function(e) {
                let btnDel = e.target.getAttribute('data-id');

                if(btnDel && btnDel.includes('btnDelete'))
                {
                    localStorage.removeItem('data');
                }
            });
            

    </script>
    
@endpush
