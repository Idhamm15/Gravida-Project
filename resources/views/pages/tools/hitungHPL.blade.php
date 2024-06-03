@extends('layouts.app')

@section('title', 'Artikel Page')

@section('content')
    @include('component.landing_pages.partials.hero_section')
    <!-- Contact Start -->
    <div class="container-fluid contact py-5" style="background: var(--bs-primary);">
        <div class="container pt-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h1 class="display-3 text-white mb-4">Hitung HPL</h1>
                        <p class="text-white fs-4">(perkiraan hari kelahiran bayi berdasarkan usia kehamilan)</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form rounded p-5">
                        <form id="hplForm">
                            <h1 class="display-6 mb-4">Yuk Cek Kehamilan bunda!!</h1>
                            <div class="row gx-4 gy-3">
                                <div class="col-12">
                                    <input type="number" id="HHT" class="form-control bg-white border-0 py-3 px-4" placeholder="Masukkan Tanggal">
                                </div>
                                <div class="col-12">
                                    <select id="bulan" class="form-control bg-white border-0 py-3 px-4">
                                        <option value="-">Pilih bulan..</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <input type="number" id="tahun" class="form-control bg-white border-0 py-3 px-4" placeholder="Masukkan Tahun">
                                </div>
                                <div class="col-12">
                                    <button type="button" onclick="hplhitung()" class="btn btn-primary btn-primary-outline-0 w-100 py-3 px-5">Lihat Hasil</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div><br><br>
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <h1 class="display-3 text-white mb-4">Lihat Hasil</h1>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form rounded p-5">
                        <center>
                            <p class="hpl">HPL <br><span id="HPL" class="display-2 text-white mb-4" style="font-size: 35px;"></span></p>
                            <p class="hpl">Usia Kehamilan <br> <span id="usiaKehamilan" class="text-white mb-4" style="font-size: 50px;"></span> minggu</p>
                            <p class="hpl">Trimester <br> <span id="trimester" class="display-3 text-white mb-4" style="font-size: 50px;"></span></p>
                            <p class="hpl">Panjang Badan Janin <br> <span id="panjangBadan" class="display-3 text-white mb-4" style="font-size: 50px;"></span></p>
                            <p class="hpl">Berat Badan Janin <br> <span id="beratBadan" class="display-3 text-white mb-4" style="font-size: 50px;"></span></p>
                        </center>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Contact End -->






@push('addon-script')
<script type="text/javascript">
    function hplhitung() {
        var HPL = document.getElementById("HPL");
        var usiaKehamilanElem = document.getElementById("usiaKehamilan");
        var trimesterElem = document.getElementById("trimester");
        var panjangBadanElem = document.getElementById("panjangBadan");
        var beratBadanElem = document.getElementById("beratBadan");
        
        var HHT = document.getElementById("HHT").value;
        var bulan = document.getElementById("bulan").value;
        var tahun = document.getElementById("tahun").value;
        var check = '';

        // cek input
        if (HHT == '' || HHT == 0) {
            check = "Masukkan HHT";
        } else if (HHT > 31) {
            check = "HHT tidak valid";
        } else if (bulan == "-") {
            check = "Masukkan bulan";
        } else if (tahun == '' || tahun == 0) {
            check = "Harap masukkan tahun";
        }

        if (check != '') {
            HPL.innerHTML = check;
            return;
        }

        // Hitung HPL
        if (bulan >= 1 && bulan <= 3) {
            HHT = +HHT + 7;
            bulan = +bulan + 9;
            if (bulan > 12) {
                bulan -= 12;
                tahun = +tahun + 1;
            }
        } else if (bulan >= 4 && bulan <= 12) {
            HHT = +HHT + 7;
            bulan = bulan - 3;
            tahun = +tahun + 1;    
        }

        // validasi bulan & tahun
        if (bulan == 2) {
            if (tahun % 4 == 0) {
                if (HHT > 29) {
                    HHT = HHT - 29;
                    bulan = +bulan + 1;
                }
            } else {
                if (HHT > 28) {
                    HHT = HHT - 28;
                    bulan = +bulan + 1;
                }
            }
        } else if (bulan == 4 || bulan == 6 || bulan == 9 || bulan == 11) {
            if (HHT > 30) {
                HHT = HHT - 30;
                bulan = +bulan + 1;
            }
        } else {
            if (HHT > 31) {
                HHT = HHT - 31;
                bulan = +bulan + 1;
            }
        }

        // konversi bulan
        const bulanNama = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        bulan = bulanNama[bulan - 1];

        HPL.innerHTML = HHT + ' - ' + bulan + ' - ' + tahun;

        // Hitung usia kehamilan dalam minggu
        var tanggalHariIni = new Date();
        var tanggalHPL = new Date(tahun, bulanNama.indexOf(bulan), HHT);
        var usiaKehamilan = Math.round((tanggalHPL - tanggalHariIni) / (1000 * 60 * 60 * 24 * 7));
        
        usiaKehamilanElem.innerHTML = 40 - usiaKehamilan;

        // Tentukan trimester berdasarkan usia kehamilan
        var trimester = "";
        if (usiaKehamilan <= 13) {
            trimester = "Trimester 1";
        } else if (usiaKehamilan <= 26) {
            trimester = "Trimester 2";
        } else {
            trimester = "Trimester 3";
        }
        trimesterElem.innerHTML = trimester;

        // Tentukan ukuran panjang badan dan berat badan janin
        var panjangBadan = "";
        var beratBadan = "";
        if (usiaKehamilan <= 13) {
            panjangBadan = "7-8 cm";
            beratBadan = "23-70 gram";
        } else if (usiaKehamilan <= 26) {
            panjangBadan = "35-37 cm";
            beratBadan = "750-1000 gram";
        } else {
            panjangBadan = "48-53 cm";
            beratBadan = "2600-3700 gram";
        }
        panjangBadanElem.innerHTML = panjangBadan;
        beratBadanElem.innerHTML = beratBadan;
    }
</script>
@endpush




@endsection
