@extends('portal.app')

@section('content')

    <style>
        .box-upload {
            position: relative;
            width: 150px;
            height: 150px;
        }

        .box-upload .inner-upload {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
        }
    </style>
    <div id="content">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-12">
                    <h3>Feedback</h3>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="box-confirm">
                        <form method="POST" action="{{ route('course-feedback', $course->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Kelas<span class="error-msg">*</span></label>
                                        <input type="text" class="form-control" name="course" value="{{ $course->name }}" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Rating<span class="error-msg">*</span></label>
                                        <select name="rating" id="" class="form-control">
                                            <?php
                                            for ($i=1; $i <= 5; $i++) {
                                                echo '<option value="'.$i.'" '.($i == 5 ? 'selected' : '').'>'.$i.'</option>';
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Berikan pengalaman anda belajar di kelas ini <span class="error-msg">*</span></label>
                                        <textarea name="feedback" id="" cols="30" rows="10" class="form-control" required>{{ !empty($data->feedback) ? nl2br($data->feedback) : '' }}</textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="row mt-5 mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn-cta-custom">Kirim</button>
                                        <a href="{{ route('my.my-course') }}" class="btn-cta-danger" >Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
