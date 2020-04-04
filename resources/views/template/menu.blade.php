<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-left8"></i>
		</a> <span class="font">เมนู</span>
        <a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
    </div>
    <div class="sidebar-content">
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="{{ route('profile.index') }}">
                            <img src="/images/user.png" alt="" class="rounded-circle" width="50">
                        </a>
                    </div>
                    <div class="media-body">
                        <div class="media-title font-weight-semibold f-16"> {!! Auth::user()->name !!} </div>
                        <div class="font-size-xs opacity-10 mt-2">
                            <label class="badge badge-primary f-12">{!! Auth::user()->username !!}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Str::startsWith(Request::route()->getName(), 'dashboard') ? 'active' : '' }}">
                        <i class="icon-home2"></i>
                        <span class="font">
                            หน้าหลัก
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('brand.index') }}" class="nav-link {{ Str::startsWith(Request::route()->getName(), 'brand') ? 'active' : '' }}">
                        <i class="icon-steering-wheel"></i>
                        <span class="font">
                            ยี่ห้อรถ
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('car.index') }}" class="nav-link {{ Str::startsWith(Request::route()->getName(), 'car') ? 'active' : '' }}">
                        <i class="icon-car2"></i>
                        <span class="font">
                            ข้อมูลรถ
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('wishlist.index') }}" class="nav-link {{ Str::startsWith(Request::route()->getName(), 'wishlist') ? 'active' : '' }}">
                        <i class="icon-bookmark"></i>
                        <span class="font">
                            ข้อมูลรถที่สนใจ
                        </span>
                        @if(wishlist_count() != 0)
                            <span class="badge bg-danger-400 align-self-center ml-auto"> {{ wishlist_count() }} </span>
                        @endif
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('interested.index') }}" class="nav-link {{ Str::startsWith(Request::route()->getName(), 'interested') ? 'active' : '' }}">
                        <i class="icon-star-full2"></i>
                        <span class="font">
                            รายการที่สนใจ
                        </span>
                        @if(interested_count() != 0)
                            <span class="badge bg-danger-400 align-self-center ml-auto"> {{ interested_count() }} </span>
                        @endif
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link {{ Str::startsWith(Request::route()->getName(), 'contact') ? 'active' : '' }}">
                        <i class="icon-list"></i>
                        <span class="font">
                            รายการที่ติดต่อ
                        </span>
                        @if(contact_count() != 0)
                            <span class="badge bg-danger-400 align-self-center ml-auto"> {{ contact_count() }} </span>
                        @endif
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link {{ Str::startsWith(Request::route()->getName(), 'profile') ? 'active' : '' }}">
						<i class="icon-profile"></i>
						<span class="font">
						 โปรไฟล์
						</span>
					</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form-menu').submit();">
                        <form action="{{ route('logout') }}" id="logout-form-menu" method="POST">
                            @csrf
                        </form>
						<i class="icon-switch2"></i> <span class="font"> ออกจากระบบ </span>
					</a>
                </li>
            </ul>
        </div>
    </div>
</div>

