<div>


    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light bordered">

                <div class="portlet-body">
                    <div id="dashboard_amchart_1" class="CSSAnimationChart">


                        <div class="row">


                            @if (session()->has('Password'))
                                <div wire:poll.7000ms class="alert alert-danger" role="alert">
                                    <p>
                                        {{ session('Password') }}
                                    </p>
                                </div>
                                <br>
                            @endif


                            @if (session()->has('message'))
                                <div wire:poll.7000ms class="alert alert-success" role="alert">
                                    <p>
                                        {{ session('message') }}
                                    </p>
                                </div>
                                <br>
                            @endif


                            <div class="col-md-6">
                                {{-- <div class="zool-img"></div>

                                <br>
                                <button class="btn btn-main center">تغير الصورة</button>
                                <br>
                                <br>
                                <br>
                                <input class='form-control' type="file">
                                <br>
                                <button wire:click='changeAdminPassword({{ $user->id }})' class="btn btn-success">
                                    تغير الصورة
                                </button> --}}
                                <br>
                                اسم المشرف :
                                <div class="text admin-name">
                                    @if (!$EditName)
                                        <i wire:click='showEdtingName()' class="fa fa-edit"></i>
                                        {{ $user->name }}
                                    @endif

                                    @if ($EditName)

                                        <input wire:model.lazy='name' type="text" value=""
                                            placeholder="{{ $user->name }}" class="form-control" required>
                                        <button wire:click='changeAdminName({{ $user->id }})'
                                            class="btn btn-success">حفــظ</button>
                                    @endif

                                </div>

                            </div>

                            <div class="col-md-6">
                                <br>
                                <br>

                                <hr>
                                @if (!$ChangePssword)
                                    البريد الالكتروني:
                                    <div class="text admin-name">

                                        @if (!$EditEmail)
                                            <i wire:click='showEdtingُُEmail' class="fa fa-edit"> </i>

                                            {{ $user->email }}
                                        @endif

                                        @if ($EditEmail)
                                            <input wire:model.lazy='email' type="text" value=""
                                                placeholder="{{ $user->email }}" class="form-control">
                                            <button wire:click='changeAdminEmail({{ $user->id }})'
                                                class="btn btn-success">حفــظ</button>
                                        @endif

                                    </div>

                                    رقم الهاتف :
                                    <div class="text admin-name">

                                        @if (!$EditPhone)
                                            <i wire:click='showEdtingُُPhone' class="fa fa-edit"> </i>

                                            {{ $user->phone }}
                                        @endif

                                        @if ($EditPhone)
                                            <input wire:model.lazy='phone' type="number" value=""
                                                placeholder="{{ $user->phone }}" class="form-control">
                                            <button wire:click='changeAdminPhone({{ $user->id }})'
                                                class="btn btn-success">حفــظ</button>
                                        @endif

                                    </div>
                                    <br>
                                    <hr>
                                    <button wire:click='showEdtingُُPassword' class="btn btn-danger">
                                        تغير كلمة المرور
                                    </button>
                                @endif
                                @if ($ChangePssword)

                                    <label>كلمة المرور القديمة</label>
                                    <input wire:model.lazy='OldPassword' class="form-control" type="password" required>

                                    <hr class="yellow">


                                    <label>كلمة المرور الجديدة</label>
                                    <input wire:model.lazy='password' class="form-control" type="password">

                                    <br>

                                    <label> تأكيد كلمة المرور الجديدة</label>
                                    <input wire:model.lazy='password_con' class="form-control" type="password">

                                    <br>
                                    <button wire:click='changeAdminPassword({{ $user->id }})'
                                        class="btn btn-success">
                                        تغير كلمة المرور
                                    </button>

                                    <button wire:click='changeAdminPasswordExit' class="btn btn-info">
                                        الغاء
                                    </button>

                                @endif

                                <hr>


                            </div> {{-- End col-md-6 --}}


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .zool-img {
        border-radius: 50% !important;
        background-image: url("{{ it()->url('/produactcoontroller/9.jpg') }}");
        background-size: cover;
        background-repeat: no-repeat;
        width: 250px;
        height: 230px;
        margin: 0 20px;
        -webkit-box-shadow: 4px 5px 10px 6px #fdd835c7;
        /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
        -moz-box-shadow: 4px 5px 10px 6px #fdd835c7;
        /* Firefox 3.5 - 3.6 */
        box-shadow: 4px 5px 10px 6px #fdd835c7;
        /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */

    }

    .bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#fdd835), to(#fdd835));
        background: linear-gradient(to right, #FF9800, #fdd835)
    }

    .admin-name {

        text-align: center;
        font-size: 30px;
        padding-left: 156px;
        margin-top: 22px;
        color: #fbcd01;
    }

</style>
