@extends('layouts.master')
@section('title')
    Admin - Live Chat
@endsection
@section('css')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Admin
        @endslot
        @slot('title')
            Live Chat
        @endslot
    @endcomponent
    <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
        <div class="card">
            <div class="p-3 px-lg-4 border-bottom">
                <div class="row">
                    <div class="col-xl-4 col-7 justify-content-center">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar-sm me-3 d-sm-block d-none">
                                <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}" alt=""
                                    class="img-fluid d-block rounded-circle">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-14 mb-1 text-truncate"><a href="#" class="text-dark">Jennie
                                        Sherlock</a></h5>
                                <p class="text-muted text-truncate mb-0">Online</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-5">
                        <ul class="list-inline user-chat-nav text-end mb-0">
                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-search"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                                        <form class="px-2">
                                            <div>
                                                <input type="text" class="form-control border bg-soft-light"
                                                    placeholder="Search...">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Profile</a>
                                        <a class="dropdown-item" href="#">Archive</a>
                                        <a class="dropdown-item" href="#">Muted</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="chat-conversation p-3" data-simplebar style="max-height: 550px;">
                <ul class="list-unstyled mb-0">
                    <li class="chat-day-title">
                        <span class="title">Today</span>
                    </li>
                    <li>
                        <div class="conversation-list">
                            <div class="d-flex">
                                <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}"
                                    class="rounded-circle avatar-sm" alt="">
                                <div class="flex-1">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <div class="conversation-name"><span class="time">10:00 AM</span></div>
                                            <p class="mb-0">Good Morning</p>
                                        </div>
                                        <div class="dropdown align-self-start">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Copy</a>
                                                <a class="dropdown-item" href="#">Save</a>
                                                <a class="dropdown-item" href="#">Forward</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>

                    <li class="right">
                        <div class="conversation-list">
                            <div class="d-flex">
                                <div class="flex-1">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <div class="conversation-name"><span class="time">10:02 AM</span></div>
                                            <p class="mb-0">Good morning</p>
                                        </div>
                                        <div class="dropdown align-self-start">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Copy</a>
                                                <a class="dropdown-item" href="#">Save</a>
                                                <a class="dropdown-item" href="#">Forward</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}"
                                    class="rounded-circle avatar-sm" alt="">
                            </div>

                        </div>

                    </li>

                    <li>
                        <div class="conversation-list">
                            <div class="d-flex">
                                <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}"
                                    class="rounded-circle avatar-sm" alt="">
                                <div class="flex-1">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <div class="conversation-name"><span class="time">10:04 AM</span></div>
                                            <p class="mb-0">
                                                Hi there, How are you?
                                            </p>
                                        </div>
                                        <div class="dropdown align-self-start">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Copy</a>
                                                <a class="dropdown-item" href="#">Save</a>
                                                <a class="dropdown-item" href="#">Forward</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex">
                                <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}"
                                    class="rounded-circle avatar-sm" alt="">
                                <div class="flex-1">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <div class="conversation-name"><span class="time">10:04 AM</span></div>
                                            <p class="mb-0">
                                                Waiting for your reply.As I heve to go back soon. i have to travel long
                                                distance.
                                            </p>
                                        </div>
                                        <div class="dropdown align-self-start">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Copy</a>
                                                <a class="dropdown-item" href="#">Save</a>
                                                <a class="dropdown-item" href="#">Forward</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </li>

                    <li class="right">
                        <div class="conversation-list">
                            <div class="d-flex">
                                <div class="flex-1">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <div class="conversation-name"><span class="time">10:08 AM</span></div>
                                            <p class="mb-0">
                                                Hi, I am coming there in few minutes. Please wait!! I am in taxi right
                                                now.
                                            </p>
                                        </div>
                                        <div class="dropdown align-self-start">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Copy</a>
                                                <a class="dropdown-item" href="#">Save</a>
                                                <a class="dropdown-item" href="#">Forward</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}"
                                    class="rounded-circle avatar-sm" alt="">
                            </div>
                        </div>

                    </li>

                    <li>
                        <div class="conversation-list">
                            <div class="d-flex">
                                <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}"
                                    class="rounded-circle avatar-sm" alt="">
                                <div class="flex-1">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <div class="conversation-name"><span class="time">10:06 AM</span></div>
                                            <p class="mb-0">
                                                Thank You very much, I am waiting here at StarBuck cafe.
                                            </p>
                                        </div>
                                        <div class="dropdown align-self-start">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Copy</a>
                                                <a class="dropdown-item" href="#">Save</a>
                                                <a class="dropdown-item" href="#">Forward</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>


                    <li>
                        <div class="conversation-list">
                            <div class="d-flex">
                                <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}"
                                    class="rounded-circle avatar-sm" alt="">
                                <div class="flex-1">
                                    <div class="ctext-wrap">
                                        <div class="ctext-wrap-content">
                                            <div class="conversation-name"><span class="time">10:09 AM</span></div>
                                            <p class="mb-0">
                                                img-1.jpg & img-2.jpg images for a New Projects
                                            </p>

                                            <ul class="list-inline message-img mt-3  mb-0">
                                                <li class="list-inline-item message-img-list">
                                                    <a class="d-inline-block m-1" href="">
                                                        <img src="{{ URL::asset('assets/images/small/img-1.jpg') }}"
                                                            alt="" class="rounded img-thumbnail">
                                                    </a>
                                                </li>

                                                <li class="list-inline-item message-img-list">
                                                    <a class="d-inline-block m-1" href="">
                                                        <img src="{{ URL::asset('assets/images/small/img-2.jpg') }}"
                                                            alt="" class="rounded img-thumbnail">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="dropdown align-self-start">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Copy</a>
                                                <a class="dropdown-item" href="#">Save</a>
                                                <a class="dropdown-item" href="#">Forward</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="p-3 border-top">
                <div class="row">
                    <div class="col">
                        <div class="position-relative">
                            <input type="text" class="form-control border bg-soft-light"
                                placeholder="Enter Message...">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span
                                class="d-none d-sm-inline-block me-2">Send</span> <i
                                class="mdi mdi-send float-end"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
