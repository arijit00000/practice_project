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