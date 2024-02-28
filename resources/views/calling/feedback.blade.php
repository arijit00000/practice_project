@include('layouts.header')
@include('calling.callingnav')

<!-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif -->

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="upload-btn-form">
                <button class="btn my-btn" data-toggle="modal" data-target="#openForm">ADD+</button>
            </div>
        </div>
    </div>  
</div>

<!-- Feedback Table -->

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>FeedBack Id</th>
                        <th>FedBack Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @if(isset($feedback))
                    @foreach($feedback as $fback)
                    <tr>
                        <td>
                            {{$fback->f_id}}
                        </td>
                        <td id="name_{{$fback->f_id}}">
                            {{$fback->f_name}}
                        </td>
                        <td>
                            <a href="{{route('edit.feedback', ['idi'=>$fback->f_id])}}" data-toggle="modal" data-target="#openForm">Edit</a>
                            <a href="{{route('delete.feedback', ['idi' => $fback->f_id])}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
              {{-- {{route('delete.feedback')}}/{{$fback->f_id}} --}}
              {{-- {{route('delete.feedback', ['idi' => $fback->f_id])}} --}}
            </table>
        </div>
    </div>  
</div>

<!-- Feedback Data Entry -->

<div id="openForm" class="modal fade" role="dialog">
    <div class="model-dialog modal-sm">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                    <h5 class="modal-title">Add Data</h5>
                </div>
                <div class="modal-body">
                    <form class="my_form" action="{{route('submit.feedback')}}" method="POST">
                        @csrf
                        
                        <input class="form-control" type="text" id="feedbackName" name="feedbackName" placeholder="Name">
                        <input class="btn my-btn" type="submit" id="submitForm" class="btn btn-primary">
                        
                    </form>
                </div>
            </div>
    </div>
</div>

@include('layouts.footer')