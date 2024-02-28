@include('layouts.header')
@include('calling.callingnav')
<?php 
// $sessionvariable = session('success')?session('success'):""
?>

<!-- add data modal button-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="upload-btn-form">
                <button class="btn my-btn" data-toggle="modal" data-target="#openForm">ADD+</button>
            </div>
        </div>
    </div>  
</div>

<!-- Number count card -->
<div class="container">
    <div class="row">
        <div class="column">
            <div class="card">
            <h3>Card 1</h3>
            <p>Some text</p>
            <p>Some text</p>
            </div>
        </div>

        <div class="column">
            <div class="card">
            <h3>Card 2</h3>
            <p>Some text</p>
            <p>Some text</p>
            </div>
        </div>
        
        <div class="column">
            <div class="card">
            <h3>Card 3</h3>
            <p>Some text</p>
            <p>Some text</p>
            </div>
        </div>
        
        <div class="column">
            <div class="card">
            <h3>Card 4</h3>
            <p>Some text</p>
            <p>Some text</p>
            </div>
        </div>
    </div>
</div>


<!-- Table -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Patient Number</th>
                            <th>Appointment Date</th>
                            <th>Comment</th>
                            <th>Comment Date</th>
                        </tr>
                    </thead>
                    <tbody id="table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</div>

<script>
    // var fetchdata 
    // (session('success'))

    //     <div class="alert alert-success">
    //         {{ session('success') }}
    //     </div>
</script>


<!-- Data entry modal -->
<div id="openForm" class="modal fade" role="dialog">
    <div class="model-dialog modal-sm">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h5 class="modal-title">Add Data</h5>
                </div>
                <div class="modal-body">
                    <form class="my_form" id="dataForm">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <input class="form-control" type="text" id="patientName" name="patientName" placeholder="Patient Name">
                        <input class="form-control" type="text" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" maxlength="12" placeholder="Patient Mobile Number">
                        <input class="form-control" type="date" id="appointmentDate" name="appointmentDate" placeholder="Appointment Date">
                        <input class="form-control" type="text" id="comment" name="comment" placeholder="Put Comment">
                        <button class="btn my-btn" type="button" id="submitForm" class="btn btn-primary" onclick="submitform()">Submit</button>
                    </form>
                </div>
            </div>
    </div>
</div>

<!-- Submit Data -->
<script>
    function submitform(){
        let patientId, patientname, patientmobile, appointmentdate, comment, notificationDate

        patientid = document.getElementById("id").value;
        patientname = document.getElementById("patientName").value;
        patientmobile = document.getElementById("mobileNumber").value;
        appointmentdate = document.getElementById("appointmentDate").value;
        comment = document.getElementById("comment").value;

        let commentdate, day, month, year;
        commentdate = comment.match("[0-9]{2}([\-/. ])[0-9]{2}[\-/. ][0-9]{4}");
        if(commentdate != null){
            let dateSplitted = commentdate[0].split(commentdate[1]);
            day = dateSplitted[0];
            month = dateSplitted[1];
            year = dateSplitted[2];

            notificationDate = year+"-"+month+"-"+day;
        }

        let patientData = {patientid:patientid, patientname:patientname, patientmobile:patientmobile, appointmentdate:appointmentdate, comment:comment, notifyDate:notificationDate,_token:"{{csrf_token()}}"}

        let patientdata = $.ajax({
            type: 'POST',
            url: "{{ route('submit.data') }}",
            data: JSON.stringify(patientData),
            datatype: "json",
            contentType: "application/json",
            success: function(resultdata){
                Swal.fire({
                    title: 'Success !!',
                    text: resultdata,
                    icon: 'success',
                    confirmButtonText: 'Done',
                })
                $('#openForm').modal('hide');
                resetForm();
                loadTable();
            }
        })
    }
</script>

<!-- Reset From -->
<script>
    function resetForm(){
       document.getElementById("dataForm").reset(); 
    }
</script>

<!-- Reset Form with class -->
<script>
    $(".close").click(resetForm);
</script>

<!-- Load Page -->
<script>
    $(document).ready(function(){
        loadTable();
    })
</script>

<!-- Load Table -->
<script>
    function loadTable(){
        $.ajax({
            type: "GET",
            url: "{{route('load.data')}}",
            dataType:"JSON",
            contentType: "application/json",
            success:function(resultData){
                if(resultData.success){
                    console.log(resultData['data']);
                    let table = "";
                    resultData['data'].map((value)=>{
                        table +="<tr><td id='name_"+value.id+"'>"+value.patient_name+"</td><td>"+value.patient_number+"</td><td>"+value.appoint_date+"</td><td>"+value.comment+"</td><td>"+value.notification_date+"</td><td><button onclick='editData("+value.id+")'>Edit</button></td><td><button onclick='deleteData("+value.id+")'>Delete</button></td></tr>";
                    })
                    $("#table").html(table);
                    $('#table').DataTable({
                        fixedHeader: true
                    });
                }
            }
        })
    }
</script>

<!-- Edit Record -->
<script>
    // function editData(id){
    //     let patientname = $("#name_"+id).html();
    //     alert(patientname);
    //     $('#openForm').modal('show');
    // }
        function editData(id){
            $.ajax({
                type: "POST",
                url: "{{route('edit.fill.data')}}",
                data: JSON.stringify({id:id, _token:"{{csrf_token()}}"}),
                dataType:"JSON",
                contentType: "application/json",
                success:function(resultData){
                    // console.log(resultData['data']);
                    let dataArray = resultData['data'];
                    let patientId = dataArray['id'];
                    let patientName = dataArray['patient_name'];
                    let patientNumber = dataArray['patient_number'];
                    let patientAppointment = dataArray['appoint_date'];
                    let patientComment = dataArray['comment'];

                    $("#id").val(patientId);
                    $("#patientName").val(patientName);
                    $("#mobileNumber").val(patientNumber);
                    $("#appointmentDate").val(patientAppointment);
                    $("#comment").val(patientComment);
                    $('#openForm').modal('show');
                }
            })
        }
</script>

<!-- Delete Record -->
<script>
    function deleteData(id){
        // alert("Are You Sure?");
        confirm("Are You Sure?");
        let text = "Press a button!\nEither OK or Cancel.";
        if (confirm(text) == true) {
            $.ajax({
                type: "POST",
                url: "{{route('delete.data')}}",
                data: JSON.stringify({id:id, _token:"{{csrf_token()}}"}),
                dataType:"JSON",
                contentType: "application/json",
                success:function(resultData){
                    if(resultData.success){
                        Swal.fire({
                        title: 'Success !!',
                        text: 'Succefully Delete',
                        icon: 'success',
                        confirmButtonText: 'Done',
                        })
                    }
                }
            })
        }
    }
</script>

<!-- Count Row -->
<script>
    function loadRowCount(){
        $.ajax({
            type: "GET",
            url: "{{route('card')}}",
            dataType:"JSON",
            contentType: "application/json",
            success:function(resultData){
                if(resultData.success){
                    console.log(resultData['countdata']);
                }
            }
        })
    }
</script>

@include('layouts.footer')