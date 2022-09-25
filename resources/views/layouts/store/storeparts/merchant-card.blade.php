@isset($merchant)
    {{-- {{ Storage::url($merchant->merchant_picture) }} --}}
    <div class="col-md-3">
        <div class="card merchant">
            <div class="box">
                <div class="img">
                    <img src="">
                </div>
                <h2><a href="{{ route('merchant.details',$merchant->id) }}">{{ $merchant->first_name}} </a><br><span>Laptops</span></h2>
                <p>Mansoura Company </p>
                <span>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </span>
            </div>
        </div>

    </div>
@endisset
