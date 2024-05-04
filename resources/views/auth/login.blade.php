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