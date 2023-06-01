@extends('backend.master')
@push('css')
@endpush
@section('content')
    <!-- content @s -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="components-preview wide-md">
                            <div class="nk-block-head nk-block-head-lg wide-sm">
                                <div class="nk-block-head-content">
                                    {{-- <div class="nk-block-head-sub"><a class="back-to" href="html/components.html"><em class="icon ni ni-arrow-left"></em><span>Components</span></a></div> --}}
                                    <h2 class="nk-block-title fw-normal">Bookings</h2>

                                </div>
                            </div><!-- .nk-block-head -->
                            <!-- .nk-menu-item -->
                            <div class="nk-block nk-block-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Booking List</h4>
                                        <div class="nk-block-des">
                                            {{-- <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-preview">
                                    <div class="card-inner">
                                        <table class="datatable-init table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Contact No</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Booking Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($bookings)
                                                    @foreach ($bookings as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{$item->phone_number}}</td>
                                                            <td>
                                                                {{ $item->email }}
                                                            </td>
                                                            <td>{{ $item->address }}</td>
                                                          
                                                            <td>
                                                                {{ \Carbon\Carbon::parse($item->booking_date)->format('Y-m-d') }}
                                                            </td>
                                                         

                                                        </tr>
                                                    @endforeach
                                                @endisset


                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- .card-preview -->
                            </div> <!-- nk-block -->

                        </div><!-- .components-preview -->
                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->
    @endsection
