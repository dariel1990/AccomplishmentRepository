@extends('admin.layouts.app')


@section('content')

    <div class="container-fluid mt-4">

    <div class="row col-lg-12 col-md-12">
        
        <div class="card col-lg-5 col-md-7 col-sm-12 p-2">
            <h4>Category</h4>
            <select class="form-select" aria-label="Default select example" id="category">
                <option value="selected">All</option>
                <option value="1">Major Function</option>
                <option value="2">Core Function</option>
                <option value="3">Support Function</option>
              </select>


            <div class="card-body" hidden>
                <button class="btn btn-md btn-info float-end" id="btnSet">Set Target</button>

                <div class="mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Particular</label>
                    <textarea class="form-control" id="mainTaskDesc" rows="3"></textarea>
                </div>

                <div id="task"></div>
            </div>        
        </div>


        <div class="col-lg-7 col-md-5 col-sm-12" id="main-output"></div>
     
    </div>

 

    </div>

@endsection


@push('page-scripts')
    <script>

            $('#category').change(function() {
                document.querySelector('.card-body').removeAttribute('hidden')
            })

            // Set target button
            $('#btnSet').click((e) => {
                e.preventDefault();
                    
                $('#percentage').html(`<div class="mt-3" id="sub-task">
                    <label for="">Target</label>
                    <input type="text" class="form-control form-control-sm" style="width: 25%; font-size: 25px">
                </div>`);
                
                let taskVal = $('#mainTaskDesc').val();

                $('#task').append(`<div class="card p-2">
                                <h4>${taskVal}</h4>
                                <button type="button" class="btn btn-sm btn-primary" data-index="task">Add Sub</button>
                            </div>`);
                
                
            })


         



            document.addEventListener('click', function(e) {

                let btnAtt = e.target.getAttribute('data-index');

                if(btnAtt && btnAtt.includes('task')) {

                    let desNode = document.createElement('div');

                    desNode.innerHTML = `
                                            <label for="exampleFormControlTextarea1" class="form-label">Sub-Task Description</label>
                                            <textarea class="form-control" id="subDesc" rows="3"></textarea>
                                            <button type="button" class="btn btn-sm btn-success float-end mt-1" id="btnSubmit" data-key="submit">Submit</button>
                                        `;

                    document.querySelector('#task').append(desNode);
                    

                }
            })



            document.addEventListener('click', function(e) {
                let submitAttr = e.target.getAttribute('data-key');

                if(submitAttr && submitAttr.includes('submit'))
                {
                    let category = document.getElementById('category').value;
                    let subTask = document.querySelector('#subDesc').value;
                    
                    localStorage.setItem('data', subTask);

                    let subData = localStorage.getItem('data');

                    document.querySelector('#main-output').innerHTML = `<div class="card"><div class="card-body">
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
                                
                                </div></div>`;
                    

                }

            })


            document.addEventListener('click', function(e) {
                let btnDel = e.target.getAttribute('data-id');

                if(btnDel && btnDel.includes('btnDelete'))
                {
                    localStorage.removeItem('data');
                }
            })
            

    </script>
    
@endpush
