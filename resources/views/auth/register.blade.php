<!-- Swal Cdn -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Ajax Jquery Cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<form>
    @csrf

    <!-- Name -->
    <input type="text" id="name" placeholder="Put Your Name" required>
    <!-- Email -->
    <input type="text" id="email" placeholder="Put Your Email" required>
    <!-- Mobile No -->
    <input type="text" id="mobileno" placeholder="Put Your MobileNo" maxlength="10" required>
    <!-- Age -->
    <input type="date" id="dob" placeholder="Put Your DOB" required>
    <!-- Password -->
    <input type="password" id="password" placeholder="Put Your Password" required>
    <!-- Confirm Password -->
    <input type="cpassword" id="cpassword" placeholder="Put Your Confirm Password" required onkeyup="checkPass()">
    <!-- Submit Button -->
    <input type="button" value="Submit" onclick="submitRegistration()">
    <p id="forPassword"></p>
</form>


<script>
    function checkPass(){
        let password = document.getElementById("password").value;
        let cpassword = document.getElementById("cpassword").value;
        
        if(password == cpassword){
            document.getElementById("forPassword").innerHTML="Password Is Correct";
            document.getElementById("forPassword").style.color="#006400";
        }
        else{
            document.getElementById("forPassword").innerHTML="Password Is Not Correct";
            document.getElementById("forPassword").style.color="#FF0000";
        }
    }
</script>

<script>
    function submitRegistration(){
        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let mobile = document.getElementById("mobileno").value;
        let dob = document.getElementById("dob").value;
        let password = document.getElementById("password").value;

        let registrationdata = {name:name, email:email, mobile:mobile, dob:dob, password:password, _token:"{{ csrf_token() }}"}

        let newData = $.ajax({
            type:'POST',
            url:"{{route('userregistration')}}",
            data:JSON.stringify(registrationdata),
            datatype:"json",
            contentType:"application/json",
            success: function(response){
                if(response.success){
                    window.location.href = "{{ route('homepage') }}";
                }
                else{
                    Swal.fire({
                    icon:"error",
                    title: "Oops...",
                    text: "Mobile No or Email id already exists !!",
                    confirmButtonText:"Ok"
                    })
                }
            },
            error: function ( xhr, status, error) {
                Swal.fire({
                    icon:"error",
                    title:"error",
                    text:"Something went wrong",
                    confirmButtonText:"Ok"
                })
            }   
        }) 
    }
</script>