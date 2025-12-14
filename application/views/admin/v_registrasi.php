<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title2; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 0;
        }

        .btn {
            border-radius: 0;
        }

        .card {
            margin-bottom: 50px;
            margin-top: 50px;
            /* Margin bottom untuk menjauhkan dari footer */
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .hint {
            font-size: 14px;
            color: #6c757d;
        }

        .form-container {
            max-width: 900px;
            /* Lebar maksimum form */
        }

        .additional-fields {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Gereja Kristen Sumba Waikabubak</p>
                        <h1>Registrasi Jemaat GKS Waikabubak</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card form-container">
                    <div class="card-body">
                        <form id="registrationForm" method="post" action="<?php echo site_url('admin/registrasi/submit_step4'); ?>" enctype="multipart/form-data">
                            <div id="step1" class="step">
                                <h3 class="text-center">Informasi Pelayanan</h3>
                                <div class="form-group">
                                    <label for="wilayah_pelayanan">Wilayah Pelayanan</label>
                                    <select class="form-control" id="wilayah_pelayanan" name="wilayah_pelayanan">
                                        <option value="">Pilih</option>
                                        <option value="Komerda">Komerda</option>
                                        <option value="Kampung Baru">Kampung Baru</option>
                                        <option value="Kasau">Kasau</option>
                                        <option value="Kolada">Kolada</option>
                                        <option value="Dokaka">Dokaka</option>
                                        <option value="Kasel">Kasel</option>
                                        <option value="Modu">Modu</option>
                                        <option value="Iya Ate">Iya Ate</option>
                                        <option value="Tawasangu">Tawasangu</option>
                                        <option value="Watu Takula">Watu Takula</option>
                                        <option value="Bali Ledo">Bali Ledo</option>
                                        <option value="Wee Kaka">Wee Kaka</option>
                                        <option value="Sobarade">Sobarade</option>
                                        <option value="Praipare">Praipare</option>
                                    </select>
                                    <small class="hint">Pilih wilayah pelayanan tempat Anda tinggal.</small>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="4"></textarea>

                                    <small class="hint">Masukkan alamat lengkap Anda.</small>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="nextStep(1)">Next</button>
                            </div>

                            <div id="step2" class="step hidden">
                                <h3 class="text-center">Kelengkapan Data KK</h3>
                                <div class="form-group">
                                    <label for="no_kk">No. Kartu Keluarga</label>
                                    <input type="text" class="form-control" id="no_kk" name="no_kk">
                                    <small class="hint">Masukkan nomor kartu keluarga Anda.</small>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kepala_keluarga">Nama Kepala Keluarga</label>
                                    <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga">
                                    <small class="hint">Masukkan nama kepala keluarga Anda.</small>
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
                            </div>

                            <div id="step3" class="step hidden">
                                <h3 class="text-center">Data Jemaat</h3>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                    <small class="hint">Masukkan nama lengkap Anda.</small>
                                </div>
                                <div class="form-group">
                                    <label for="peran_dalam_keluarga">Peran Dalam Keluarga</label>
                                    <select class="form-control" id="peran_dalam_keluarga" name="peran_dalam_keluarga" onchange="showAnakField()">
                                        <option value="">Pilih</option>
                                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                                        <option value="Suami">Suami</option>
                                        <option value="Istri">Istri</option>
                                        <option value="Anak">Anak ke-</option>
                                    </select>
                                    <select class="form-control mt-2" id="anak_ke" name="anak_ke" style="display: none;">
                                        <?php for ($i = 1; $i <= 20; $i++): ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <small class="hint">Pilih peran Anda dalam keluarga.</small>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                    <small class="hint">Masukkan tempat lahir Anda.</small>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                    <small class="hint">Pilih tanggal lahir Anda.</small>
                                </div>
                                <div class="form-group">
                                    <label for="umur">Umur:</label>
                                    <select class="form-control" id="umur" name="umur" required>
                                        <option value="">Pilih</option>
                                        <?php for ($i = 0; $i <= 100; $i += 5): ?>
                                            <?php if ($i == 100): ?>
                                                <option value=">100">>100</option>
                                            <?php else: ?>
                                                <option value="<?php echo $i; ?>-<?php echo $i + 5; ?>"><?php echo $i; ?>-<?php echo $i + 5; ?></option>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </select>
                                    <small class="form-text text-muted">Pilih kisaran umur Anda.</small>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="">Pilih</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <small class="hint">Pilih jenis kelamin Anda.</small>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                    <select class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir">
                                        <option value="">Pilih</option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                        <option value="TK">TK</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D1/D2/D3">D1/D2/D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                    <small class="hint">Pilih pendidikan terakhir Anda.</small>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan:</label>
                                    <select class="form-control" id="pekerjaan" name="pekerjaan" required>
                                        <option value="Tidak Bekerja">Pilih</option>
                                        <option value="Sekolah">Sekolah</option>
                                        <option value="Petani">Petani</option>
                                        <option value="ASN/TNI/POLRI/BUMN/BUMD">ASN/TNI/POLRI/BUMN/BUMD</option>
                                        <option value="Wiraswasta/Pengusaha">Wiraswasta/Pengusaha</option>
                                        <option value="Pegawai Honorer/Kontrak">Pegawai Honorer/Kontrak</option>
                                        <option value="Pensiunan">Pensiunan</option>
                                        <option value="Sopir/Ojek/Buruh">Sopir/Ojek/Buruh</option>
                                        <option value="Nelayan">Nelayan</option>
                                        <option value="Lainnya">Lainnya</option>
                                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                                    </select>
                                    <small class="form-text text-muted">Pilih pekerjaan Anda.</small>
                                </div>
                                <div class="form-group">
                                    <label>Golongan Darah</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah_a" value="A">
                                        <label class="form-check-label" for="golongan_darah_a">A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah_b" value="B">
                                        <label class="form-check-label" for="golongan_darah_b">B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah_ab" value="AB">
                                        <label class="form-check-label" for="golongan_darah_ab">AB</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah_o" value="O">
                                        <label class="form-check-label" for="golongan_darah_o">O</label>
                                    </div>
                                    <small class="hint">Pilih golongan darah Anda.</small>
                                </div>
                                <div class="form-group">
                                    <label for="pendonor">Bersedia menjadi pendonor?</label>
                                    <select class="form-control" id="pendonor" name="pendonor">
                                        <option value="Iya">Iya</option>
                                        <option value="Mungkin">Mungkin</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    <small class="hint">Pilih apakah Anda bersedia menjadi pendonor.</small>
                                </div>
                                <div class="form-group">
                                    <label>Pelayanan Gereja yang Sudah Diterima</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="baptis" name="pelayanan[]" value="Baptis" onchange="toggleAdditionalField('baptis')">
                                        <label class="form-check-label" for="baptis">Baptis</label>
                                        <div id="baptis_fields" class="additional-fields hidden">
                                            <input type="date" class="form-control mt-2" id="tanggal_baptis" name="tanggal_baptis" placeholder="Tanggal Baptis">
                                            <input type="text" class="form-control mt-2" id="pendeta_baptis" name="pendeta_baptis" placeholder="Dilayani Oleh Pendeta">
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sidi" name="pelayanan[]" value="Sidi" onchange="toggleAdditionalField('sidi')">
                                        <label class="form-check-label" for="sidi">Sidi</label>
                                        <div id="sidi_fields" class="additional-fields hidden">
                                            <input type="date" class="form-control mt-2" id="tanggal_sidi" name="tanggal_sidi" placeholder="Tanggal Sidi">
                                            <input type="text" class="form-control mt-2" id="pendeta_sidi" name="pendeta_sidi" placeholder="Dilayani Oleh Pendeta">
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nikah" name="pelayanan[]" value="Nikah" onchange="toggleAdditionalField('nikah')">
                                        <label class="form-check-label" for="nikah">Nikah</label>
                                        <div id="nikah_fields" class="additional-fields hidden">
                                            <input type="date" class="form-control mt-2" id="tanggal_nikah" name="tanggal_nikah" placeholder="Tanggal Nikah">
                                            <input type="text" class="form-control mt-2" id="pendeta_nikah" name="pendeta_nikah" placeholder="Dilayani Oleh Pendeta">
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perjamuan_kudus" name="pelayanan[]" value="Perjamuan Kudus">
                                        <label class="form-check-label" for="perjamuan_kudus">Perjamuan Kudus</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pks_part" name="pelayanan[]" value="PKS/PART" onchange="togglePKSField()">
                                        <label class="form-check-label" for="pks_part">PKS/PART</label>
                                        <div id="pks_part_fields" class="additional-fields hidden">
                                            <label for="pks_part_kali">Dalam tahun berjalan, sudah berapa kali mendapat pelayanan PKS?</label>
                                            <select class="form-control mt-2" id="pks_part_kali" name="pks_part_kali">
                                                <option value="Belum">Belum</option>
                                                <option value="1 Kali">1 Kali</option>
                                                <option value="2 Kali">2 Kali</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto (Boleh Dikosongkan)</label>
                                    <input type="file" class="form-control-file" id="photo" name="photo">
                                    <small class="hint">Unggah foto Anda (format: jpg, jpeg, png).</small>
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Previous</button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(3)">Next</button>
                            </div>

                            <div id="step4" class="step hidden">
                                <h3 class="text-center">Data Login</h3>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <small class="hint">Masukkan alamat email Anda.</small>
                                </div>
                                <div class="form-group">
                                    <label for="hp">HP</label>
                                    <input type="text" class="form-control" id="hp" name="hp">
                                    <small class="hint">Masukkan nomor telepon Anda.</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <small class="hint">Masukkan password Anda.</small>
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="prevStep(4)">Previous</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        let currentStep = 1;

        function showAnakField() {
            if ($('#peran_dalam_keluarga').val() === 'Anak') {
                $('#anak_ke').show();
            } else {
                $('#anak_ke').hide();
            }
        }

        function toggleAdditionalField(service) {
            const fieldsId = service + '_fields';
            $('#' + fieldsId).toggle();
        }

        function togglePKSField() {
            $('#pks_part_fields').toggle();
        }

        function nextStep(step) {
            let url;
            if (step === 1) {
                url = "<?php echo site_url('admin/registrasi/submit_step1'); ?>";
            } else if (step === 2) {
                url = "<?php echo site_url('admin/registrasi/submit_step2'); ?>";
            } else if (step === 3) {
                url = "<?php echo site_url('admin/registrasi/submit_step3'); ?>";
            }

            $.ajax({
                url: url,
                type: "POST",
                data: $('#registrationForm').serialize(),
                success: function(response) {
                    console.log('Response from step ' + step + ':', response); // Debugging: Tampilkan respons dari server
                    if (response === '') {
                        currentStep++;
                        showStep(currentStep);
                    } else {
                        alert(response); // Tampilkan pesan error dari server
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error); // Debugging: Tampilkan pesan error AJAX
                    alert('Terjadi kesalahan saat mengirim data. Silakan coba lagi.');
                }
            });
        }

        function prevStep(step) {
            currentStep--;
            showStep(currentStep);
        }

        function showStep(step) {
            $('.step').addClass('hidden');
            $('#step' + step).removeClass('hidden');
        }

        $(document).ready(function() {
            showStep(currentStep);
        });
    </script>
</body>

</html>