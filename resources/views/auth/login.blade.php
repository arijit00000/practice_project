<!-- Swal Cdn -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Ajax Jquery Cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<form>
    @csrf
    <!-- Email -->
    <input type="text" id="email" placeholder="Put Your Email" required>
    <!-- Password -->
    <input type="password" id="password" placeholder="Put Your Password" required>
    <!-- Submit Button -->
    <input type="button" value="Submit" onclick="submitLogin()">
</form>

<div>
    <p>Id - dutta@gmail.com</p>
    <p>PW - arijitdutta</p>
</div>

<script>
    function submitLogin(){
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;

        let logindata = {email:email, password:password, _token:"{{ csrf_token() }}"}

        let newData = $.ajax({
            type:'POST',
            url:"{{route('userlogin')}}",
            data:JSON.stringify(logindata),
            datatype:"json",
            contentType:"application/json",
            success: function(response){
                if(response.success){
                    window.location.href = "{{ route('dashboard') }}";
                }
                else{
                    Swal.fire({
                    icon:"error",
                    title: "Oops...",
                    text: "Email Id & Password Does't Match!!",
                    confirmButtonText:"Ok"
                    })
                }
            },
            error: function ( xhr, status, error) {
              //  let msg = xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.length>0?xhr.responseJSON.message:"Somethinf went wrong"
                Swal.fire({
                    icon:"error",
                    title:"error",
                    text:"Something Went Wrong", // dynamic error...
                    confirmButtonText:"Ok"
                })
            }   
        }) 
    }
</script>