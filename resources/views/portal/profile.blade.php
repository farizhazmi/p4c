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
                    <h3>Profile</h3>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="box-confirm">
                        <form method="POST" action="{{ route('my.do-profile', $user->id) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Depan <span class="error-msg">*</span></label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ $user->first_name }}" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Belakang <span class="error-msg">*</span></label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ $user->last_name }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir <span class="error-msg">*</span></label>
                                        <input type="text" name="datebirth" style="padding: 5px 12px;"
                                            class="form-control datepicker"
                                            value="{{ !empty($user->datebirth) ? date('d-m-Y', strtotime($user->datebirth)) : '' }}"
                                            required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Phone <span class="error-msg">*</span></label>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $user->phone }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin <span class="error-msg">*</span></label>
                                        <select name="sex" id="" class="form-control" required>
                                            <option value="L" {{ $user->gender == 'L' ? 'selected' : '' }}>Pria
                                            </option>
                                            <option value="P" {{ $user->gender == 'P' ? 'selected' : '' }}>Wanita
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Agama <span class="error-msg">*</span></label>
                                        <select name="religion" id="" class="form-control" required>
                                            <option value="Islam" {{ $user->religion == 'Islam' ? 'selected' : '' }}>Islam
                                            </option>
                                            <option value="Katolik" {{ $user->religion == 'Katolik' ? 'selected' : '' }}>
                                                Katolik</option>
                                            <option value="Protestan"
                                                {{ $user->religion == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                                            <option value="Budha" {{ $user->religion == 'Budha' ? 'selected' : '' }}>Budha
                                            </option>
                                            <option value="Hindhu" {{ $user->religion == 'Hindhu' ? 'selected' : '' }}>
                                                Hindhu</option>
                                            <option value="Ateis" {{ $user->religion == 'Ateis' ? 'selected' : '' }}>Ateis
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Password<span class="error-msg">*</span></label>
                                        <input type="password" name="password" class="form-control"
                                            value="" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="address" id="" cols="30" rows="10" class="form-control" required>{{ $user->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Gambar <span class="error-msg">(150px 150px)</span></label>
                                        <div class="box-upload">
                                            @if (!empty($user->picture))
                                                <img id="display-image2"
                                                    src="{{ asset('upload/portal-student/picture/' . $user->picture) }}"
                                                    style="position: absolute;width: 100%;height: 100%;" alt="">
                                                <input id="image-input2" type="file" name="picture"
                                                class="form-control inner-upload"  />
                                            @else
                                                <img id="display-image2" src="{{ asset('portal/assets/img/user.png') }}"
                                                    style="position: absolute;width: 100%;height: 100%;" alt="">
                                                <input id="image-input2" type="file" name="picture"
                                                class="form-control inner-upload" required />
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-5 mb-5">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn-cta-custom">Simpan</button>

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
