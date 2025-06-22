<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="description" content="{{ env('APP_DESCRIPTION') }}">
    <meta name="keywords" content="{{ env('APP_KEYWORD') }}">
    <meta name="author" content="Coding Class" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('portal/assets/css/kelas.css') }}">
    <style>
        section.content {
            padding: 30px 30px;
            position: fixed;
            width: 100%;
        }

        .list-box-materi {
            background: #fff;
            padding-right: 20px;
            height: 90vh;
            overflow-y: scroll;
            border-radius: 15px;
        }

        .list-box-materi ul {
            padding: 0;
            margin: 0;
        }

        .list-box-materi ul li {
            list-style: none;
            margin-bottom: 10px;
            display: flex;
        }

        span.number {
            width: 25px;
            display: inline-block;
        }

        .list-box-materi ul li a {
            display: block;
            padding: 10px 21px;
            background: #f4f4f4;
            text-decoration: none;
            color: #000;
            font-family: arial;
            border-radius: 10px;
            font-size: 14px;
            width: 100%;
        }

        .list-box-materi ul li a:hover {
            background: #ffa406;
            color: #fff;
            transition: all .4s;
        }

        .list-box-materi ul li a.active {
            background: #ffa406;
            color: #fff;
            transition: all .4s;
        }

        .list-box-materi ul li a.done {
            background: #1ab69d;
            color: #fff;
            transition: all .4s;
        }

        .media-player {
            background: #fff;
            width: 100%;
            height: 500px;
        }

        .content-box {
            height: 500px;
        }

        li.parent-materi {
            background: #727272;
            color: #fff;
            padding: 10px 21px;
            font-weight: bold;
        }

        .list-box-materi ul li.done a {
            background: #18b198;
            color: #fff;
        }

        .ck.ck-content {
            height: 300px;
        }

        span.duration {
            float: right;
            background: #1ab69d;
            padding: 0 5px;
            border-radius: 5px;
            color: #fff;
        }

        a.active span.duration {
            background: #fff;
            color: #1ab69d;
        }

        .list-box-materi ul li a:hover span.duration {
            background: #fff;
            color: #1ab69d;
            transition: all .4s;
        }
    </style>
</head>

<body>

    <header style="padding: 5px 0;box-shadow: rgb(149 157 165 / 20%) 0px 8px 24px;margin-bottom: 20px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('my.my-course') }}"><img style="width: 150px;"
                            src="{{ asset('assets/images/logo/logo-dark.png') }}" alt="logo"></a>
                    <div style="float: right;margin-top: 19px;font-weight: bold;margin-right: 18px;">{{ $course->name }}
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="list-box-materi">
                        <ul>
                            @if ($listMateri)
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($listMateri as $i => $parent)
                                    <li class="parent-materi">{{ $i }}</li>
                                    @if (sizeof($parent) > 0)
                                        @foreach ($parent as $j => $child)
                                            <li><a class="{{ in_array($child['id'], $progresBelajar) ? 'done' : '' }}  {{ $courseDetailNow->id == $child['id'] ? 'active' : '' }}"
                                                    href="{{ route('my.course-progress', [$course->slug, $child['id']]) }}"><span
                                                        class="number my-auto">{{ $no }}</span>
                                                    {{ $child['subject'] }}
                                                    <span class="duration">{{ $child['duration'] }}</span></a></li>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    @if (!empty($courseDetailNow->embedd))
                        <div class="content-box">
                            <div class="media-player">
                                <iframe width="100%" height="100%"
                                    src="https://www.youtube.com/embed/{{ $courseDetailNow->embedd }}"
                                    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    @endif

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-penjelasan-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-penjelasan" type="button" role="tab"
                                aria-controls="nav-penjelasan" aria-selected="true">Penjelasan</button>

                            <button class="nav-link" id="nav-diskusi-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-diskusi" type="button" role="tab" aria-controls="nav-diskusi"
                                aria-selected="false">Diskusi</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-penjelasan" role="tabpanel"
                            aria-labelledby="nav-penjelasan-tab">
                            @if (!empty($courseDetailNow->content))
                                <div class="desc">
                                    {!! $courseDetailNow->content !!}
                                </div>
                            @endif
                        </div>




                        <div class="tab-pane fade" id="nav-diskusi" role="tabpanel" aria-labelledby="nav-diskusi-tab">
                            <div class="discussion">
                                <form action="{{ route('send-comment-matery', [$course->id, $courseDetailNow->id]) }}"
                                    method="POST" class="mb-4" style="overflow: hidden;">
                                    @csrf
                                    @method('POST')

                                    <textarea name="comment" cols="30" rows="5" class="form-control" placeholder="Tuliskan pertanyaan kamu..."
                                        required></textarea>
                                    <button type="submit" class="btn-cta-custom"
                                        style="float: right;margin-top: 10px;padding: 7px 38px;">Kirim</button>
                                </form>

                                @if (sizeof($comments) > 0)
                                    @foreach ($comments as $comment)
                                        @if ($comment->mode == 'mentor')
                                            <div class="discuss-item mentor">
                                                <div class="discuss-item-header">
                                                    <img style="width: 80px"
                                                        src="{{ asset('assets/images/logo/logo-dark.png') }}"
                                                        alt="">

                                                    <div class="discuss-info">
                                                        <h5 class="username">Mentor Coding Class</h5>
                                                        <span
                                                            class="comment-date">{{ date('d M Y H:i:s', strtotime($comment->created_at)) }}</span>
                                                    </div>
                                                </div>
                                                <div class="discuss-item-body">
                                                    <p>{!! $comment->comment !!}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="discuss-item student">
                                                <div class="discuss-item-header">
                                                    <div class="discuss-info">
                                                        <h5 class="username">
                                                            {{ $user->first_name . ' ' . $user->last_name }}</h5>
                                                        <span
                                                            class="comment-date">{{ date('d M Y H:i:s', strtotime($comment->created_at)) }}</span>
                                                    </div>
                                                    @if (!empty($user->picture))
                                                        <img src="{{ asset('upload/portal-student/picture/' . $user->picture) }}"
                                                            alt="">
                                                    @else
                                                        <img src="{{ asset('portal/assets/img/user.png') }}"
                                                            alt="">
                                                    @endif
                                                </div>
                                                <div class="discuss-item-body">
                                                    <p>{!! $comment->comment !!}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                @endif



                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>

    <script src="{{ asset('portal/assets/js/main.js') }}"></script>


</body>

</html>
