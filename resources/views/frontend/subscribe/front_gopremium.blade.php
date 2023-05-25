@extends('frontend.layouts2.main2')

@section('title', 'UNP Asset | Go Premium')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-6 col-lg-6 text-center">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-8"></div>
                            <div class="col col-2">Free</div>
                            <div class="col col-2">Premium</div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-8">
                                <p class="card-text">Premium stock photos</p>
                                <p class="card-text">Premium videos</p>
                                <p class="card-text">Premium PSD Files</p>
                                <p class="card-text">Unlimited Downloads</p>
                                <p class="card-text">Premium AEP files</p>
                            </div>
                            <div class="col col-2">
                                <p class="text-primary"><i class="bi bi-check-lg"></i></p>
                                <p class="text-secondary"><i class="bi bi-x-lg"></i></p>
                                <p class="text-secondary"><i class="bi bi-x-lg"></i></p>
                                <p class="text-secondary"><i class="bi bi-x-lg"></i></p>
                                <p class="text-secondary"><i class="bi bi-x-lg"></i></p>
                            </div>
                            <div class="col col-2">
                                <p class="text-primary"><i class="bi bi-check-lg"></i></p>
                                <p class="text-primary"><i class="bi bi-check-lg"></i></p>
                                <p class="text-primary"><i class="bi bi-check-lg"></i></p>
                                <p class="text-primary"><i class="bi bi-check-lg"></i></p>
                                <p class="text-primary"><i class="bi bi-check-lg"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col col-12 col-md-6 col-lg-6 pt-4 pt-md-0 pt-lg-0">
                <div class="row">
                    <div class="col col-12">
                        <div class="card shadow" style="max-width: 30rem">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col col-6">
                                        <h5 class="card-title">12 Bulan</h5>
                                        <h5 class="card-title">Rp. 100.000/Bulan</h5>
                                        <p class="card-text">Rp. 1.200.000 setiap 12 Bulan</p>
                                    </div>
                                    <div class="col col-6 text-center">
                                        <a href="{{ route('show_bayar', Auth::user()->id) }}"
                                            class="btn btn-warning mt-4">Subscribe now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col col-12 pt-4">
                        <div class="card shadow" style="max-width: 30rem">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col col-6">
                                        <h5 class="card-title">1 Bulan</h5>
                                        <h5 class="card-title">Rp. 150.000</h5>
                                        <p class="card-text">Rp. 150.000 setiap bulan</p>
                                    </div>
                                    <div class="col col-6 text-center">
                                        <a href="{{ route('show_bayar', Auth::user()->id) }}"
                                            class="btn btn-warning mt-4">Subscribe now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> --}}

            <div class="col col-12 col-md-6 col-lg-6 pt-4 pt-md-0 pt-lg-0">
                <div class="card justify-content-center">
                    <h5 class="card-header">Choose Plan</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    {{-- <label>Pilihan subscribe anda : </label> --}}
                                    <select class="form-select" aria-label="Default select example" id="subscribe"
                                        name="subscribe" onchange="subscribe()">
                                        <option>Pilihan Subscribe</option>
                                        <option value="1">Tahunan</option>
                                        <option value="2">Bulanan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="psubscribe" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Pajak (10%)</p>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="pajak" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer px-auto">
                        <div class="row">
                            <div class="col">
                                <p>Total</p>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="total" readonly>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center mt-3  ">
                            <div class="col col-12 col-lg-6">
                                <a href="" class="btn btn-success form-control py-2" data-bs-toggle="modal"
                                    id="konfirmasi" onclick="test()">Konfirmasi</a>
                                {{-- <form action="{{ route('update_premium', Auth::user()->id) }}" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-warning px-auto" value="Confirm and Pay">
                                </form> --}}
                            </div>
                            <div class="col col-12">
                                <p class="my-2">Langganan Anda akan diperpanjang secara otomatis setiap bulan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="" style="height: 32vh"></div>

    <!-- Modal-->
    <div class="modal fade" id="bayar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Metode Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-check d-flex align-item-center">
                        <input class="form-check-input" type="radio" name="pembayaran" value="123"
                            id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            <img src="{{ asset('dist_frontend/img/gopay.svg') }}" alt="">
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pembayaran" value="456"
                            id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            <img src="{{ asset('dist_frontend/img/Dana.svg') }}" alt="">
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pembayaran" value="789"
                            id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            <img src="{{ asset('dist_frontend/img/BRI.svg') }}" alt="">
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pembayaran" value="901"
                            id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            <img src="{{ asset('dist_frontend/img/BNI.svg') }}" alt="">
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pembayaran" value="234"
                            id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            <img src="{{ asset('dist_frontend/img/mandiri.svg') }}" alt="">
                        </label>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" data-bs-toggle="modal" onclick="getValue()">Confirm
                        and
                        Pay</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="konBayar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">
                        <span class="text-success fs-4"><i class="bi bi-emoji-laughing-fill"></i></span>
                        Konfirmasi
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nomor Virtual Account</label>
                        <input class="form-control form-control-md" type="text" aria-label=".form-control-lg example"
                            name="virtual" id="virtual" value="" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Total Harga</label>
                        <input class="form-control form-control-md" type="text" aria-label=".form-control-lg example"
                            name="total" id="total2" value="" readonly>
                    </div>

                    <p>Batas Akhir Pembayaran 2 jam setelah Nomor Virtual Account diberikan!!</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('update_premium', Auth::user()->id) }}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-warning px-auto" value="Konfirmasi">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
