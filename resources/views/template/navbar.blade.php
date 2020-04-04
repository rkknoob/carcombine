<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="{{ route('dashboard') }}" class="d-inline-block white">
            <img src="/images/logo-text.png" alt="">
        </a>
    </div>
    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbar-mobile">
        <span class="navbar-text ml-md-3 mr-md-auto">
            {{-- <span class="badge bg-success"> Online </span> --}}
        </span>
        <ul class="navbar-nav">
            @if(wishlist_count() != 0)
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown"
                    aria-expanded="false">
                    <i class="icon-bookmark"></i>
                    <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0"> {{ wishlist_count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                    <div class="dropdown-content-body dropdown-scrollable">
                        <ul class="media-list">
                            @foreach (wishlist_new() as $k => $item)
                            @if($k != 0)
                            <hr>
                            @endif
                            <li class="media font">
                                <div class="media-body">
                                    <div class="media-title">
                                        <span class="font-weight-semibold">
                                            {{ $item->brand }} {{ $item->model }}  {{ $item->year }}  {{ $item->gear }}
                                        </span>
                                    </div>
                                    <span class="text-muted">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong> ชื่อ </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <p> {{ $item->name  }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong> เบอร์โทร </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <p> {{ $item->tel  }} </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong> วัน/เวลา </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <p> {{ date_thai($item->created_at, TRUE) }} </p>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="dropdown-content-footer justify-content-center p-0">
                        <a href="{{ route('wishlist.index') }}" class="bg-light text-grey w-100 py-2">
                            <span class="text-center d-block top-0 font"> ข้อมูลรถที่สนใจทั้งหมด </span>
                        </a>
                    </div>
                </div>
            </li>
            @endif
            @if(interested_count() != 0)
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown"
                    aria-expanded="false">
                    <i class="icon-star-full2"></i>
                    <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0"> {{ interested_count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                    <div class="dropdown-content-body dropdown-scrollable">
                        <ul class="media-list">
                            @foreach (interested_new() as $k => $item)
                            @if($k != 0)
                            <hr>
                            @endif
                            <li class="media font">
                                <div class="media-body">
                                    <div class="media-title">
                                        <span class="font-weight-semibold">
                                            <a href="{{ route('car.show', $item->CarEvaID) }}">
                                                {{ $item->cars['CarBrandName'] }} {{ $item->cars['CarBrandGenName'] }}
                                            </a>
                                        </span>
                                        <span class="text-muted float-right">
                                            {{ date_thai($item->created_at, TRUE) }}
                                        </span>
                                    </div>
                                    <span class="text-muted">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong> ชื่อ </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <p> {{ $item->Name  }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong> เบอร์โทร </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <p> {{ $item->Phone  }} </p>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="dropdown-content-footer justify-content-center p-0">
                        <a href="{{ route('interested.index') }}" class="bg-light text-grey w-100 py-2">
                            <span class="text-center d-block top-0 font"> รายการที่สนใจทั้งหมด </span>
                        </a>
                    </div>
                </div>
            </li>
            @endif
            @if(contact_count() != 0)
            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown"
                    aria-expanded="false">
                    <i class="icon-bell3"></i>
                    <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0"> {{ contact_count() }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                    <div class="dropdown-content-body dropdown-scrollable">
                        <ul class="media-list">
                            @foreach (contact_unread() as $k => $item)
                            @if($k != 0)
                            <hr>
                            @endif
                            <li class="media font">
                                <div class="media-body">
                                    <div class="media-title">
                                        <a href="{{ route('contact.show', $item->id) }}">
                                            <span class="font-weight-semibold">
                                                {{ substr($item->detail, 0, 20).'...'  }}
                                            </span>
                                            <span class="text-muted float-right">
                                                {{ date_thai($item->created_at, TRUE) }}
                                            </span>
                                        </a>
                                    </div>
                                    <span class="text-muted">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong> ผู้ติดต่อ </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <p> {{ $item->first_name  }} {{ $item->last_name  }} </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong> เบอร์โทร </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <p> {{ $item->tel  }} </p>
                                            </div>
                                        </div>
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="dropdown-content-footer justify-content-center p-0">
                        <a href="{{ route('contact.index') }}" class="bg-light text-grey w-100 py-2">
                            <span class="text-center d-block top-0 font"> รายการที่ติดต่อทั้งหมด </span>
                        </a>
                    </div>
                </div>
            </li>
            @endif
            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="/images/user.png" alt="" class="rounded-circle" width="35">
                    <span> {{ Auth::user()->name }} </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right font">
                    <a href="{{ route('profile.index') }}" class="dropdown-item"><i class="icon-profile"></i> โปรไฟล์
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item font"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="icon-switch2"></i> ออกจากระบบ </a>
                    <form action="{{ route('logout') }}" id="logout-form" method="POST">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
