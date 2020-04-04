@extends('layouts.app')
@section('title', 'Home | หน้าหลัก')
@section('content')
@include('template.header', ['icon'=> 'icon-home2', 'name' => 'หน้าหลัก'])
<div class="content">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font"> ภาพรวม </h6>
                </div>
                <div class="card-body px-2">
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="{{ route('brand.index') }}"
                                    class="btn bg-transparent border-warning-400 text-warning-400 rounded-round border-2 btn-icon mr-3">
                                    <i class="icon-steering-wheel"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold font f-20"> ยี่ห้อรถ </div>
                                    <span class="text-muted f-16"> {{ num($brand) }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="{{ route('car.index') }}"
                                    class="btn bg-transparent border-teal text-teal rounded-round border-2 btn-icon mr-3">
                                    <i class="icon-car2"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold font f-20"> จำนวนรถ </div>
                                    <span class="text-muted f-16"> {{ num($car) }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="{{ route('interested.index') }}"
                                    class="btn bg-transparent border-pink text-pink rounded-round border-2 btn-icon mr-3">
                                    <i class="icon-star-full2"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold font f-20"> รายการที่สนใจ </div>
                                    <span class="text-muted f-16"> {{ num($interested) }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="{{ route('contact.index') }}"
                                    class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon mr-3">
                                    <i class="icon-list"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold font f-20"> รายการที่ติดต่อ </div>
                                    <span class="text-muted f-16"> {{ num($contact) }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font"></h6>
                </div>
                <div class="card-body px-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="width_chart">
                                <canvas id="ChartInterested" height="200"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="width_chart">
                                <canvas id="ChartWishlist" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font"> กราฟรายการที่ติดต่อ </h6>
                </div>
                <div class="card-body px-2">
                    <div class="row">
                        <div class="width_chart">
                            <canvas id="ChartContact" height="120"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title font"> กราฟจำนวนรถ</h6>
                </div>
                <div class="card-body px-2">
                    <div class="row">
                        <div class="width_chart">
                            <canvas id="ChartBrand" height="350"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('template/plugins/chart/Chart.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('template/plugins/chart/Chart.min.js') }}"></script>
    <script src="{{ asset('template/plugins/chart/config.js') }}"></script>
    <script>
        var brand      = document.getElementById('ChartBrand').getContext('2d');
        var ChartBrand = new Chart(brand, {
            type: 'horizontalBar',
            data: {
                labels:[
                    @foreach($car_count as $rs)
                        '{{ $rs->CarBrandName }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach($car_count as $rs)
                            '{{ $rs->brand_count }}',
                        @endforeach
                    ],
                    backgroundColor: color,
                    borderColor: border,
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
							ticks: {
								beginAtZero: true,
                                stepSize: 50,
                                max : {{ max($car_max) + 50 }}
							},
							scaleLabel: {
								 display: true,
								 fontSize: 18
							}
						}]
					}
            }
        });

		var interested      = document.getElementById("ChartInterested").getContext("2d");
		var ChartInterested = new Chart(interested,  {
			type: 'doughnut',
			data: {
                labels:[
                    @foreach($interested_count as $k => $rs)
                            '{{ $k }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach($interested_count as $k => $rs)
                            '{{ $rs }}',
                        @endforeach
                    ],
                    backgroundColor: color,
                    borderColor: border,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
				legend: {
				position: 'bottom',
                },
                hover: {
                    mode: 'label'
                },
                title: {
                    display: true,
                    text: 'รายการที่สนใจทั้งหมด {{ $interested_total }} ครั้ง',
                    fontSize : 22,
                    fontFamily : 'DBHelvethaica',
                    fontStyle : 'normal',
                },
                animation: {
                    duration: 500,
                    animateScale: true,
                    animateRotate: true,
                    easing: "easeOutQuart",
                }
            }
        });

        var wishlist      = document.getElementById("ChartWishlist").getContext("2d");
		var ChartWishlist = new Chart(wishlist,  {
			type: 'doughnut',
			data: {
                labels:[
                    @foreach($wishlist_count as $k => $rs)
                            '{{ $k }}',
                    @endforeach
                ],
                datasets: [{
                    data: [
                        @foreach($wishlist_count as $k => $rs)
                            '{{ $rs }}',
                        @endforeach
                    ],
                    backgroundColor: color,
                    borderColor: border,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
				legend: {
				position: 'bottom',
                },
                hover: {
                    mode: 'label'
                },
                title: {
                    display: true,
                    text: 'ข้อมูลรถที่สนใจทั้งหมด {{ $wishlist_total }} ครั้ง',
                    fontSize : 22,
                    fontFamily : 'DBHelvethaica',
                    fontStyle : 'normal',
                },
                animation: {
                    duration: 500,
                    animateScale: true,
                    animateRotate: true,
                    easing: "easeOutQuart",
                }
            }
		});

        var contact      = document.getElementById('ChartContact').getContext('2d');
        var ChartContact = new Chart(contact, {
            type: 'bar',
            data: {
                labels: short,
                datasets: [{
                    data: [@foreach($contact_month as $rs) {{ $rs }}, @endforeach],
                    backgroundColor: color,
                    borderColor: border,
                    borderWidth: 1,
                }]
            },
            options: {
                title: {
					display: true,
                    text: 'รายการที่ติดต่อ ประจำปี {{ date('Y') + 543 }}',
                    fontColor: 'black',
                    fontStyle: 'Regular',
				},
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 50,
                            max : {{ max($contact_month) + 2 }}
                        }
                    }]
                }
            }
        });
    </script>
@endpush
