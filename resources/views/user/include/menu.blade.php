
<div class="col-lg-3 d-none d-lg-block">
    <div class="sidebar sidebar--style-3 no-border stickyfill p-0">
        <div class="widget mb-0">
            <div class="widget-profile-box text-center p-3">
                @if (!empty(Auth::user()->photo))
                    <div class="image" style="background-image:url('{{asset(Auth::user()->photo)}}')"></div>
                @else
                    <div class="image" style="background-image:url('https://www.pngitem.com/pimgs/m/22-223968_default-profile-picture-circle-hd-png-download.png')"></div>
                @endif

                <div class="name">{{Auth::user()->name}}</div>
            </div>
            <div class="sidebar-widget-title py-3">
                <span>Menu</span>
            </div>
            <div class="widget-profile-menu py-3">

                <ul class="categories categories--style-3">
                    <li>
                        <a href="{{route('home')}}" class="active">
                            <i class="la la-dashboard"></i>
                            <span class="category-name">
                           Dashboard
                           </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.order.history')}}" class="">
                            <i class="la la-file-text"></i>
                            <span class="category-name">
                           Order History                         </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.profile')}}" class="">
                            <i class="la la-file-text"></i>
                            <span class="category-name">
                           Profile
                           </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('user.change.pass')}}" class="">
                            <i class="la la-heart-o"></i>
                            <span class="category-name">
                           Change Password
                           </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="la la-comment"></i>
                            <span class="category-name">
                           Logout
                           </span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
            <div class="widget-seller-btn pt-4">
                <a href="http://shop.activeitzone.com/shops/create" class="btn btn-anim-primary w-100">Be A Seller</a>
            </div>
        </div>
    </div>
</div>
