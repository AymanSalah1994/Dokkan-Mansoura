<div class="divider" style="height: 200px">
</div>
<hr>
<div class="container-fluid bg-indigo-600 text-white" style="background-color: rgba(8, 8, 8, 0.818);">
    <footer class="py-5">
        <div class="row">
            <div class="col-2">
                <h5>Social Media</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Facebook</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">YouTube</a></li>
                </ul>
            </div>

            <div class="col-2">
                <h5>{{__('Useful Links')}}</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('store.index') }}"
                            class="nav-link p-0 text-white">{{__('Home')}}</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('footer.features') }}"
                            class="nav-link p-0 text-white">{{__('Features')}}</a>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ route('footer.pricing') }}"
                            class="nav-link p-0 text-white">{{__('Pricing')}}</a>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ route('footer.faqs') }}"
                            class="nav-link p-0 text-white">{{__('FAQs')}}</a>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ route('footer.about') }}"
                            class="nav-link p-0 text-white">{{__('About')}}</a>
                    </li>
                </ul>
            </div>

            <div class="col-2">
                <h5>{{__('Merchants')}}</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('footer.merchant.apply') }}"
                            class="nav-link p-0 text-white">{{__('How to Apply')}}</a></li>
                </ul>
            </div>

            <div class="col-4 offset-1">
                <h5>{{__('Thanks for your Trust')}}</h5>
                <p>© 2021 Dokkan ELMansoura . All rights reserved.</p>
            </div>
        </div>
        <div class="d-flex justify-content-between py-4 my-4 border-top">
            <p>© 2021 Dokkan ELMansoura . All rights reserved.</p>
        </div>
    </footer>
</div>
