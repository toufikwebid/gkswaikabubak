<div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    </nav>

    <div class="custom-container">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
            </div>
            <div class="card-body">
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Jemaat</h4>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('hapus')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $this->session->flashdata('hapus'); ?>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo base_url() . 'user/management_user/update' ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="jemaat_id" value="<?php echo $user->jemaat_id; ?>">
                                <input type="hidden" name="dariadmin" value="user">

                                <div class="form-group">
                                    <label for="wilayah_pelayanan">Wilayah Pelayanan:</label>
                                    <select class="form-control" id="wilayah_pelayanan" name="wilayah_pelayanan" required>
                                        <option value="">Pilih</option>
                                        <option value="Komerda" <?php echo ($user->wilayah_pelayanan == 'Komerda') ? 'selected' : ''; ?>>Komerda</option>
                                        <option value="Kampung Baru" <?php echo ($user->wilayah_pelayanan == 'Kampung Baru') ? 'selected' : ''; ?>>Kampung Baru</option>
                                        <option value="Kasau" <?php echo ($user->wilayah_pelayanan == 'Kasau') ? 'selected' : ''; ?>>Kasau</option>
                                        <option value="Kolada" <?php echo ($user->wilayah_pelayanan == 'Kolada') ? 'selected' : ''; ?>>Kolada</option>
                                        <option value="Dokaka" <?php echo ($user->wilayah_pelayanan == 'Dokaka') ? 'selected' : ''; ?>>Dokaka</option>
                                        <option value="Kasel" <?php echo ($user->wilayah_pelayanan == 'Kasel') ? 'selected' : ''; ?>>Kasel</option>
                                        <option value="Modu" <?php echo ($user->wilayah_pelayanan == 'Modu') ? 'selected' : ''; ?>>Modu</option>
                                        <option value="Iya Ate" <?php echo ($user->wilayah_pelayanan == 'Iya Ate') ? 'selected' : ''; ?>>Iya Ate</option>
                                        <option value="Tawasangu" <?php echo ($user->wilayah_pelayanan == 'Tawasangu') ? 'selected' : ''; ?>>Tawasangu</option>
                                        <option value="Watu Takula" <?php echo ($user->wilayah_pelayanan == 'Watu Takula') ? 'selected' : ''; ?>>Watu Takula</option>
                                        <option value="Bali Ledo" <?php echo ($user->wilayah_pelayanan == 'Bali Ledo') ? 'selected' : ''; ?>>Bali Ledo</option>
                                        <option value="Wee Kaka" <?php echo ($user->wilayah_pelayanan == 'Wee Kaka') ? 'selected' : ''; ?>>Wee Kaka</option>
                                        <option value="Sobarade" <?php echo ($user->wilayah_pelayanan == 'Sobarade') ? 'selected' : ''; ?>>Sobarade</option>
                                        <option value="Praipare" <?php echo ($user->wilayah_pelayanan == 'Praipare') ? 'selected' : ''; ?>>Praipare</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $user->alamat; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="no_kk">No. Kartu Keluarga:</label>
                                    <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?php echo $user->no_kk; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="nama_kepala_keluarga">Nama Kepala Keluarga:</label>
                                    <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" value="<?php echo $user->nama_kepala_keluarga; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $user->nama; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="peran_dalam_keluarga">Peran Dalam Keluarga:</label>
                                    <select class="form-control" id="peran_dalam_keluarga" name="peran_dalam_keluarga" required>
                                        <option value="">Pilih</option>
                                        <option value="Kepala Keluarga" <?php echo ($user->peran_dalam_keluarga == 'Kepala Keluarga') ? 'selected' : ''; ?>>Kepala Keluarga</option>
                                        <option value="Suami" <?php echo ($user->peran_dalam_keluarga == 'Suami') ? 'selected' : ''; ?>>Suami</option>
                                        <option value="Istri" <?php echo ($user->peran_dalam_keluarga == 'Istri') ? 'selected' : ''; ?>>Istri</option>
                                        <option value="Anak" <?php echo ($user->peran_dalam_keluarga == 'Anak') ? 'selected' : ''; ?>>Anak</option>
                                    </select>
                                </div>

                                <div class="form-group" id="anak_ke">
                                    <label for="anak_ke">Anak ke- (jika peran adalah Anak):</label>
                                    <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="<?php echo $user->anak_ke; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir:</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $user->tempat_lahir; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $user->tanggal_lahir; ?>" required>
                                </div>

                                <?php
                                // Contoh data dari database


                                // Fungsi untuk menentukan opsi yang terpilih
                                function isSelected($value, $selectedValue)
                                {
                                    return $value === $selectedValue ? 'selected' : '';
                                }
                                ?>
                                <div class="form-group">
                                    <label for="umur">Umur:</label>
                                    <select class="form-control" id="umur" name="umur" required>
                                        <option value="">Pilih</option>
                                        <?php for ($i = 0; $i <= 100; $i += 5): ?>
                                            <?php if ($i == 100): ?>
                                                <option value=">100" <?php echo isSelected('>100', $user->umur); ?>>&gt;100</option>
                                            <?php else: ?>
                                                <option value="<?php echo $i; ?>-<?php echo $i + 5; ?>" <?php echo isSelected($i . '-' . ($i + 5), $user->umur); ?>><?php echo $i; ?>-<?php echo $i + 5; ?></option>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </select>
                                    <small class="form-text text-muted">Pilih kisaran umur Anda.</small>
                                </div>


                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_l" value="L" <?php echo ($user->jenis_kelamin == 'L') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="jenis_kelamin_l">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_p" value="P" <?php echo ($user->jenis_kelamin == 'P') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pendidikan_terakhir">Pendidikan Terakhir:</label>
                                    <select class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                                        <option value="">Pilih</option>
                                        <option value="Tidak Sekolah" <?php echo ($user->pendidikan_terakhir == 'Tidak Sekolah') ? 'selected' : ''; ?>>Tidak Sekolah</option>
                                        <option value="TK" <?php echo ($user->pendidikan_terakhir == 'TK') ? 'selected' : ''; ?>>TK</option>
                                        <option value="SD" <?php echo ($user->pendidikan_terakhir == 'SD') ? 'selected' : ''; ?>>SD</option>
                                        <option value="SMP" <?php echo ($user->pendidikan_terakhir == 'SMP') ? 'selected' : ''; ?>>SMP</option>
                                        <option value="SMA" <?php echo ($user->pendidikan_terakhir == 'SMA') ? 'selected' : ''; ?>>SMA</option>
                                        <option value="D1/D2/D3" <?php echo ($user->pendidikan_terakhir == 'D1/D2/D3') ? 'selected' : ''; ?>>D1/D2/D3</option>

                                        <option value="S1" <?php echo ($user->pendidikan_terakhir == 'S1') ? 'selected' : ''; ?>>S1</option>
                                        <option value="S2" <?php echo ($user->pendidikan_terakhir == 'S2') ? 'selected' : ''; ?>>S2</option>
                                        <option value="S3" <?php echo ($user->pendidikan_terakhir == 'S3') ? 'selected' : ''; ?>>S3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan:</label>
                                    <select class="form-control" id="pekerjaan" name="pekerjaan" required>
                                        <option value="">Pilih</option>
                                        <option value="Sekolah" <?php echo ($user->pekerjaan == 'Sekolah') ? 'selected' : ''; ?>>Sekolah</option>
                                        <option value="Petani" <?php echo ($user->pekerjaan == 'Petani') ? 'selected' : ''; ?>>Petani</option>
                                        <option value="ASN/TNI/POLRI/BUMN" <?php echo ($user->pekerjaan == 'ASN/TNI/POLRI/BUMN') ? 'selected' : ''; ?>>ASN/TNI/POLRI/BUMN</option>
                                        <option value="BUMD" <?php echo ($user->pekerjaan == 'BUMD') ? 'selected' : ''; ?>>BUMD</option>
                                        <option value="Wiraswasta/Pengusaha" <?php echo ($user->pekerjaan == 'Wiraswasta/Pengusaha') ? 'selected' : ''; ?>>Wiraswasta/Pengusaha</option>
                                        <option value="Pegawai Honorer/Kontrak" <?php echo ($user->pekerjaan == 'Pegawai Honorer/Kontrak') ? 'selected' : ''; ?>>Pegawai Honorer/Kontrak</option>
                                        <option value="Pensiunan" <?php echo ($user->pekerjaan == 'Pensiunan') ? 'selected' : ''; ?>>Pensiunan</option>
                                        <option value="Sopir/Ojek/Buruh" <?php echo ($user->pekerjaan == 'Sopir/Ojek/Buruh') ? 'selected' : ''; ?>>Sopir/Ojek/Buruh</option>
                                        <option value="Nelayan" <?php echo ($user->pekerjaan == 'Nelayan') ? 'selected' : ''; ?>>Nelayan</option>
                                        <option value="Lainnya" <?php echo ($user->pekerjaan == 'Lainnya') ? 'selected' : ''; ?>>Lainnya</option>
                                        <option value="Tidak Bekerja" <?php echo ($user->pekerjaan == 'Tidak Bekerja') ? 'selected' : ''; ?>>Tidak Bekerja</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Golongan Darah:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah_a" value="A" <?php echo ($user->golongan_darah == 'A') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="golongan_darah_a">A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah_b" value="B" <?php echo ($user->golongan_darah == 'B') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="golongan_darah_b">B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah_ab" value="AB" <?php echo ($user->golongan_darah == 'AB') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="golongan_darah_ab">AB</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="golongan_darah" id="golongan_darah_o" value="O" <?php echo ($user->golongan_darah == 'O') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="golongan_darah_o">O</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pendonor">Bersedia menjadi pendonor?</label>
                                    <select class="form-control" id="pendonor" name="pendonor" required>
                                        <option value="">Pilih</option>
                                        <option value="Iya" <?php echo ($user->pendonor == 'Iya') ? 'selected' : ''; ?>>Iya</option>
                                        <option value="Mungkin" <?php echo ($user->pendonor == 'Mungkin') ? 'selected' : ''; ?>>Mungkin</option>
                                        <option value="Tidak" <?php echo ($user->pendonor == 'Tidak') ? 'selected' : ''; ?>>Tidak</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pelayanan Gereja yang Sudah Diterima:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="baptis" name="pelayanan[]" value="Baptis" <?php echo (is_array($user->pelayanan) && in_array('Baptis', $user->pelayanan)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="baptis">Baptis</label>
                                    </div>
                                    <div class="form-group" id="baptis-group" style="display: none;">
                                        <label for="tanggal_baptis">Tanggal Baptis:</label>
                                        <input type="date" class="form-control" id="tanggal_baptis" name="tanggal_baptis" value="<?php echo $user->tanggal_baptis; ?>">
                                    </div>

                                    <div class="form-group" id="pendeta_baptis-group" style="display: none;">
                                        <label for="pendeta_baptis">Pendeta Baptis:</label>
                                        <input type="text" class="form-control" id="pendeta_baptis" name="pendeta_baptis" value="<?php echo $user->pendeta_baptis; ?> " placeholder="Dilayani Oleh Pendeta">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sidi" name="pelayanan[]" value="Sidi" <?php echo (is_array($user->pelayanan) && in_array('Sidi', $user->pelayanan)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="sidi">Sidi</label>
                                    </div>

                                    <div class="form-group" id="sidi-group" style="display: none;">
                                        <label for="tanggal_sidi">Tanggal Sidi:</label>
                                        <input type="date" class="form-control" id="tanggal_sidi" name="tanggal_sidi" value="<?php echo $user->tanggal_sidi; ?>">
                                    </div>

                                    <div class="form-group" id="pendeta_sidi-group" style="display: none;">
                                        <label for="pendeta_sidi">Pendeta Sidi:</label>
                                        <input type="text" class="form-control" id="pendeta_sidi" name="pendeta_sidi" value="<?php echo $user->pendeta_sidi; ?>" placeholder="Dilayani Oleh Pendeta">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="nikah" name="pelayanan[]" value="Nikah" <?php echo (is_array($user->pelayanan) && in_array('Nikah', $user->pelayanan)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="nikah">Nikah</label>
                                    </div>
                                    <div class="form-group" id="nikah-group" style="display: none;">
                                        <label for="tanggal_nikah">Tanggal Nikah:</label>
                                        <input type="date" class="form-control" id="tanggal_nikah" name="tanggal_nikah" value="<?php echo $user->tanggal_nikah; ?>">
                                    </div>

                                    <div class="form-group" id="pendeta_nikah-group" style="display: none;">
                                        <label for="pendeta_nikah">Pendeta Nikah:</label>
                                        <input type="text" class="form-control" id="pendeta_nikah" name="pendeta_nikah" value="<?php echo $user->pendeta_nikah; ?>" placeholder="Dilayani Oleh Pendeta">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perjamuan" name="pelayanan[]" value="Perjamuan Kudus" <?php echo (is_array($user->pelayanan) && in_array('Perjamuan Kudus', $user->pelayanan)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="perjamuan">Perjamuan Kudus</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pks_part_kali" name="pelayanan[]" value="PKS/PART" <?php echo (is_array($user->pelayanan) && in_array('PKS/PART', $user->pelayanan)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="pks_part_kali">PKS/PART</label>
                                    </div>
                                </div>






                                <div class="form-group" id="pks_part_kali-group" style="display: none;">
                                    <label for="pks_part_kali">PKS/PART:</label>
                                    <select class="form-control" id="pks_part_kali_select" name="pks_part_kali" required>
                                        <option value="">Pilih</option>
                                        <option value="Belum" <?php echo ($user->pks_part_kali == 'Belum') ? 'selected' : ''; ?>>Belum</option>
                                        <option value="1 Kali" <?php echo ($user->pks_part_kali == '1 Kali') ? 'selected' : ''; ?>>1 Kali</option>
                                        <option value="2 Kali" <?php echo ($user->pks_part_kali == '2 Kali') ? 'selected' : ''; ?>>2 Kali</option>
                                    </select>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const pilihanak = document.getElementById('peran_dalam_keluarga');
                                        const anak_ke = document.getElementById('anak_ke');


                                        const baptisCheckbox = document.getElementById('baptis');
                                        const sidiCheckbox = document.getElementById('sidi');
                                        const nikahCheckbox = document.getElementById('nikah');
                                        const pksPartCheckbox = document.getElementById('pks_part_kali');

                                        const baptisGroup = document.getElementById('baptis-group');
                                        const pendetaBaptisGroup = document.getElementById('pendeta_baptis-group');
                                        const sidiGroup = document.getElementById('sidi-group');
                                        const pendetaSidiGroup = document.getElementById('pendeta_sidi-group');
                                        const nikahGroup = document.getElementById('nikah-group');
                                        const pendetaNikahGroup = document.getElementById('pendeta_nikah-group');
                                        const pksPartGroup = document.getElementById('pks_part_kali-group');

                                        function toggleAnakFields() {
                                            if (pilihanak.value === 'Anak') {
                                                anak_ke.style.display = 'block';
                                            } else {
                                                anak_ke.style.display = 'none';
                                            }
                                        }

                                        function toggleBaptisFields() {
                                            if (baptisCheckbox.checked) {
                                                baptisGroup.style.display = 'block';
                                                pendetaBaptisGroup.style.display = 'block';
                                            } else {
                                                baptisGroup.style.display = 'none';
                                                pendetaBaptisGroup.style.display = 'none';
                                            }
                                        }

                                        function toggleSidiFields() {
                                            if (sidiCheckbox.checked) {
                                                sidiGroup.style.display = 'block';
                                                pendetaSidiGroup.style.display = 'block';
                                            } else {
                                                sidiGroup.style.display = 'none';
                                                pendetaSidiGroup.style.display = 'none';
                                            }
                                        }

                                        function toggleNikahFields() {
                                            if (nikahCheckbox.checked) {
                                                nikahGroup.style.display = 'block';
                                                pendetaNikahGroup.style.display = 'block';
                                            } else {
                                                nikahGroup.style.display = 'none';
                                                pendetaNikahGroup.style.display = 'none';
                                            }
                                        }

                                        function togglePksPartFields() {
                                            if (pksPartCheckbox.checked) {
                                                pksPartGroup.style.display = 'block';
                                            } else {
                                                pksPartGroup.style.display = 'none';
                                            }
                                        }

                                        baptisCheckbox.addEventListener('change', toggleBaptisFields);
                                        sidiCheckbox.addEventListener('change', toggleSidiFields);
                                        nikahCheckbox.addEventListener('change', toggleNikahFields);
                                        pksPartCheckbox.addEventListener('change', togglePksPartFields);
                                        pilihanak.addEventListener('change', toggleAnakFields);

                                        // Initialize fields based on current state


                                        // Initialize fields based on current state
                                        toggleBaptisFields();
                                        toggleSidiFields();
                                        toggleNikahFields();
                                        togglePksPartFields();
                                        toggleAnakFields();
                                    });
                                </script>

                                <div class="form-group">
                                    <label for="hp">No. HP:</label>
                                    <input type="text" class="form-control" id="hp" name="hp" value="<?php echo $user->hp; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="password">Pasword:</label>
                                    <input type="text" class="form-control" id="password" name="password" value="<?php echo $user->password; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="photo">photo:</label>
                                    <input type="file" class="form-control-file" id="photo" name="photo">
                                    <?php if (!empty($user->photo)): ?>
                                        <img src="<?php echo base_url('assets/images/' . $user->photo); ?>" alt="photo Jemaat" class="img-thumbnail mt-2" style="max-width: 200px;">
                                        <input type="hidden" id="gambar" value="<?php echo $user->photo ?>" name="gambar">
                                    <?php endif; ?>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>