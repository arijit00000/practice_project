@include('layouts.header')

<div class="container">
    <div class="row">
        <div class="col-lg-12" style="display: flex;">
            <div class="flip-box">
                <div class="flip-box-inner">
                    <div class="flip-box-front">
                        <img src="{{asset('asset/image/Cellphone.webp')}}" alt="Calling">
                    </div>
                    <div class="flip-box-back">
                        <h2>Calling</h2>
                        <p>Calling Related</p>
                        <a href="{{ route('open.page') }}" class="btn mybtn">Click Here</a>
                    </div>
                </div>
            </div>
            <div class="flip-box">
                <div class="flip-box-inner">
                    <div class="flip-box-front">
                        <img src="{{asset('asset/image/Socialmedia.webp')}}" alt="Calling">
                    </div>
                    <div class="flip-box-back">
                        <h2>Social</h2>
                        <p>Register & Login</p>
                        <a href="#" class="btn mybtn">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
