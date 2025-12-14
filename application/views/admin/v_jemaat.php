<div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    </nav>

    <div class="custom-container">
        <!-- <h1 class="h3 mb-2 text-gray-800">Data Jemaat</h1> -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Jemaat</h6>
                <div class="box-header">
                    <a href="<?php echo site_url('admin/registrasi/'); ?>" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Tambah Data Jemaat</a>

                </div><br>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        <thead>
                            <tr>
                                <th>Nomor KK</th>
                                <th>Nama Kepala Keluarga</th>
                                <th>Jumlah Jemaat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row): ?>
                                <tr>
                                    <td><?php echo $row->no_kk; ?></td>
                                    <td><?php echo $row->nama_kepala_keluarga; ?></td>
                                    <td><?php echo $row->jumlah_jemaat; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-primary btn-flat w-100" data-toggle="modal" data-target="#detailModal" data-no-kk="<?php echo $row->no_kk; ?>">Lihat Detail</button>
                                            <button class="btn btn-danger btn-flat w-100" data-toggle="modal" data-target="#ModalHapus<?php echo $row->no_kk; ?>">Hapus KK</button>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Jemaat -->

    <!-- The Modal -->
    <div class="modal fade" id="userModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">ADD JEMAAT</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo base_url() . 'admin/jemaat/insert' ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="jemaat_id" value="123">
                        <input type="hidden" name="dariadmin" value="yes">
                        <div class="form-group">
                            <label for="wilayah_pelayanan">Wilayah Pelayanan:</label>
                            <select class="form-control" id="wilayah_pelayanan" name="wilayah_pelayanan" required>
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
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required placeholder="Masukkan alamat lengkap"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="no_kk">No. Kartu Keluarga:</label>
                            <input type="text" class="form-control" id="no_kk" name="no_kk" value="" required placeholder="Masukkan nomor kartu keluarga">
                        </div>

                        <div class="form-group">
                            <label for="nama_kepala_keluarga">Nama Kepala Keluarga:</label>
                            <input type="text" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" value="" required placeholder="Masukkan nama kepala keluarga">
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="" required placeholder="Masukkan nama jemaat">
                        </div>

                        <div class="form-group">
                            <label for="peran_dalam_keluarga">Peran Dalam Keluarga:</label>
                            <select class="form-control" id="peran_dalam_keluarga" name="peran_dalam_keluarga" required>
                                <option value="">Pilih</option>
                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                <option value="Suami">Suami</option>
                                <option value="Istri">Istri</option>
                                <option value="Anak">Anak</option>
                            </select>
                        </div>

                        <div class="form-group" id="anak_ke" style="display: none;">
                            <label for="anak_ke">Anak ke- (jika peran adalah Anak):</label>
                            <input type="number" class="form-control" name="anak_ke" value="" placeholder="Masukkan urutan anak">
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir:</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="" required placeholder="Masukkan tempat lahir">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="" required>
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
                            <label>Jenis Kelamin:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_l" value="L">
                                <label class="form-check-label" for="jenis_kelamin_l">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_p" value="P">
                                <label class="form-check-label" for="jenis_kelamin_p">Perempuan</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pendidikan_terakhir">Pendidikan Terakhir:</label>
                            <select class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                                <option value="">Pilih</option>
                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                <option value="TK">TK</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="D1">D1/D2/D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
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
                            <label>Golongan Darah:</label>
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
                        </div>

                        <div class="form-group">
                            <label for="pendonor">Bersedia menjadi pendonor?</label>
                            <select class="form-control" id="pendonor" name="pendonor" required>
                                <option value="">Pilih</option>
                                <option value="Iya">Iya</option>
                                <option value="Mungkin">Mungkin</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Pelayanan Gereja yang Sudah Diterima:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="baptis" name="pelayanan[]" value="Baptis">
                                <label class="form-check-label" for="baptis">Baptis</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sidi" name="pelayanan[]" value="Sidi">
                                <label class="form-check-label" for="sidi">Sidi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="nikah" name="pelayanan[]" value="Nikah">
                                <label class="form-check-label" for="nikah">Nikah</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="perjamuan" name="pelayanan[]" value="Perjamuan Kudus">
                                <label class="form-check-label" for="perjamuan">Perjamuan Kudus</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pks_part_kali" name="pelayanan[]" value="PKS/PART">
                                <label class="form-check-label" for="pks_part_kali">PKS/PART</label>
                            </div>
                        </div>

                        <div class="form-group" id="baptis-group" style="display: none;">
                            <label for="tanggal_baptis">Tanggal Baptis:</label>
                            <input type="date" class="form-control" id="tanggal_baptis" name="tanggal_baptis" value="" placeholder="Masukkan tanggal baptis">
                        </div>

                        <div class="form-group" id="pendeta_baptis-group" style="display: none;">
                            <label for="pendeta_baptis">Pendeta Baptis:</label>
                            <input type="text" class="form-control" id="pendeta_baptis" name="pendeta_baptis" value="" placeholder="Masukkan nama pendeta baptis">
                        </div>

                        <div class="form-group" id="sidi-group" style="display: none;">
                            <label for="tanggal_sidi">Tanggal Sidi:</label>
                            <input type="date" class="form-control" id="tanggal_sidi" name="tanggal_sidi" value="" placeholder="Masukkan tanggal sidi">
                        </div>

                        <div class="form-group" id="pendeta_sidi-group" style="display: none;">
                            <label for="pendeta_sidi">Pendeta Sidi:</label>
                            <input type="text" class="form-control" id="pendeta_sidi" name="pendeta_sidi" value="" placeholder="Masukkan nama pendeta sidi">
                        </div>

                        <div class="form-group" id="nikah-group" style="display: none;">
                            <label for="tanggal_nikah">Tanggal Nikah:</label>
                            <input type="date" class="form-control" id="tanggal_nikah" name="tanggal_nikah" value="" placeholder="Masukkan tanggal nikah">
                        </div>

                        <div class="form-group" id="pendeta_nikah-group" style="display: none;">
                            <label for="pendeta_nikah">Pendeta Nikah:</label>
                            <input type="text" class="form-control" id="pendeta_nikah" name="pendeta_nikah" value="" placeholder="Masukkan nama pendeta nikah">
                        </div>

                        <div class="form-group" id="pks_part_kali-group" style="display: none;">
                            <label for="pks_part_kali">PKS/PART:</label>
                            <select class="form-control" id="pks_part_kali_select" name="pks_part_kali" required>
                                <option value="">Pilih</option>
                                <option value="Belum">Belum</option>
                                <option value="1 Kali">1 Kali</option>
                                <option value="2 Kali">2 Kali</option>
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

                                function toggleBaptisFields() {
                                    if (baptisCheckbox.checked) {
                                        baptisGroup.style.display = 'block';
                                        pendetaBaptisGroup.style.display = 'block';
                                    } else {
                                        baptisGroup.style.display = 'none';
                                        pendetaBaptisGroup.style.display = 'none';
                                    }
                                }

                                function toggleAnakFields() {
                                    if (pilihanak.value === 'Anak') {
                                        anak_ke.style.display = 'block';
                                    } else {
                                        anak_ke.style.display = 'none';
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

                                toggleBaptisFields();
                                toggleSidiFields();
                                toggleNikahFields();
                                togglePksPartFields();
                                toggleAnakFields();
                            });
                        </script>

                        <div class="form-group">
                            <label for="hp">No. HP:</label>
                            <input type="text" class="form-control" id="hp" name="hp" value="" placeholder="Masukkan nomor HP">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="" placeholder="Masukkan alamat email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" class="form-control" id="password" name="password" value="" placeholder="Masukkan Password">
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo:</label>
                            <input type="file" class="form-control-file" id="photo" name="photo">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Detail Jemaat -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Jemaat Berdasarkan KK terpilih</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="detailTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Peran dalam Keluarga</th>
                                    <th>Anak Ke</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Pekerjaan</th>
                                    <th>Golongan Darah</th>
                                    <th>Pendonor</th>
                                    <th>Pelayanan</th>
                                    <th>Tanggal Baptis</th>
                                    <th>Pendeta Baptis</th>
                                    <th>Tanggal Sidi</th>
                                    <th>Pendeta Sidi</th>
                                    <th>Tanggal Nikah</th>
                                    <th>Pendeta Nikah</th>
                                    <th>Perjamuan Kudus</th>
                                    <th>PKS/PART</th>
                                    <th>No HP</th>
                                    <th>Email</th>

                                    <th>photo</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="detailTableBody">
                                <!-- Data akan dimasukkan di sini melalui AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Hapus Pengguna -->
    <?php foreach ($data as $row): ?>
        <div class="modal fade" id="ModalHapus<?php echo $row->no_kk; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Jemaat</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/jemaat/hapus_kk' ?>" method="post">
                        <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $row->no_kk; ?>" />
                            <p>Seluruh data yang terhubung dengan NO KK <b><?php echo $row->no_kk; ?></b> Akan <span style="color: red;">TERHAPUS</span> Anda Yakin??</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <!-- Modal Edit Jemaat -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Jemaat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('admin/jemaat/update'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="jemaat_id" name="jemaat_id">
                        <input type="hidden" id="gambar_lama" name="gambar_lama">
                        <div class="form-group">
                            <label for="no_kk">Nomor KK:</label>
                            <input type="text" class="form-control" id="no_kk_edit" name="no_kk" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_kepala_keluarga">Nama Kepala Keluarga:</label>
                            <input type="text" class="form-control" id="nama_kepala_keluarga_edit" name="nama_kepala_keluarga" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama_edit" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="peran_dalam_keluarga">Peran dalam Keluarga:</label>
                            <input type="text" class="form-control" id="peran_dalam_keluarga_edit" name="peran_dalam_keluarga" required>
                        </div>
                        <div class="form-group">
                            <label for="anak_ke">Anak Ke:</label>
                            <input type="number" class="form-control" id="anak_ke_edit" name="anak_ke" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir:</label>
                            <input type="text" class="form-control" id="tempat_lahir_edit" name="tempat_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir:</label>
                            <input type="date" class="form-control" id="tanggal_lahir_edit" name="tanggal_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur:</label>
                            <input type="number" class="form-control" id="umur_edit" name="umur" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select class="form-control" id="jenis_kelamin_edit" name="jenis_kelamin" required>
                                <option value="">Pilih</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan_terakhir">Pendidikan Terakhir:</label>
                            <input type="text" class="form-control" id="pendidikan_terakhir_edit" name="pendidikan_terakhir" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan:</label>
                            <input type="text" class="form-control" id="pekerjaan_edit" name="pekerjaan" required>
                        </div>
                        <div class="form-group">
                            <label for="golongan_darah">Golongan Darah:</label>
                            <select class="form-control" id="golongan_darah_edit" name="golongan_darah" required>
                                <option value="">Pilih</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pendonor">Pendonor:</label>
                            <select class="form-control" id="pendonor_edit" name="pendonor" required>
                                <option value="">Pilih</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pelayanan Gereja yang Sudah Diterima:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="baptis_edit" name="pelayanan[]" value="Baptis">
                                <label class="form-check-label" for="baptis_edit">Baptis</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sidi_edit" name="pelayanan[]" value="Sidi">
                                <label class="form-check-label" for="sidi_edit">Sidi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="nikah_edit" name="pelayanan[]" value="Nikah">
                                <label class="form-check-label" for="nikah_edit">Nikah</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pks_part_edit" name="pelayanan[]" value="PKS/PART">
                                <label class="form-check-label" for="pks_part_edit">PKS/PART</label>
                            </div>
                        </div>
                        <div class="form-group" id="baptis-group-edit" style="display: none;">
                            <label for="tanggal_baptis_edit">Tanggal Baptis:</label>
                            <input type="date" class="form-control" id="tanggal_baptis_edit" name="tanggal_baptis">
                        </div>
                        <div class="form-group" id="pendeta_baptis-group-edit" style="display: none;">
                            <label for="pendeta_baptis_edit">Pendeta Baptis:</label>
                            <input type="text" class="form-control" id="pendeta_baptis_edit" name="pendeta_baptis">
                        </div>
                        <div class="form-group" id="sidi-group-edit" style="display: none;">
                            <label for="tanggal_sidi_edit">Tanggal Sidi:</label>
                            <input type="date" class="form-control" id="tanggal_sidi_edit" name="tanggal_sidi">
                        </div>
                        <div class="form-group" id="pendeta_sidi-group-edit" style="display: none;">
                            <label for="pendeta_sidi_edit">Pendeta Sidi:</label>
                            <input type="text" class="form-control" id="pendeta_sidi_edit" name="pendeta_sidi">
                        </div>
                        <div class="form-group" id="nikah-group-edit" style="display: none;">
                            <label for="tanggal_nikah_edit">Tanggal Nikah:</label>
                            <input type="date" class="form-control" id="tanggal_nikah_edit" name="tanggal_nikah">
                        </div>
                        <div class="form-group" id="pendeta_nikah-group-edit" style="display: none;">
                            <label for="pendeta_nikah_edit">Pendeta Nikah:</label>
                            <input type="text" class="form-control" id="pendeta_nikah_edit" name="pendeta_nikah">
                        </div>
                        <div class="form-group" id="pks_part-group-edit" style="display: none;">
                            <label for="pks_part_edit_select">PKS/PART:</label>
                            <select class="form-control" id="pks_part_edit_select" name="pks_part" required>
                                <option value="">Pilih</option>
                                <option value="Belum">Belum</option>
                                <option value="1 Kali">1 Kali</option>
                                <option value="2 Kali">2 Kali</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="perjamuan_kudus_edit">Perjamuan Kudus:</label>
                            <select class="form-control" id="perjamuan_kudus_edit" name="perjamuan_kudus" required>
                                <option value="">Pilih</option>
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_hp_edit">No HP:</label>
                            <input type="text" class="form-control" id="no_hp_edit" name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="email_edit">Email:</label>
                            <input type="email" class="form-control" id="email_edit" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="status_perkawinan_edit">Status Perkawinan:</label>
                            <select class="form-control" id="status_perkawinan_edit" name="status_perkawinan" required>
                                <option value="">Pilih</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Janda/Duda">Janda/Duda</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agama_edit">Agama:</label>
                            <input type="text" class="form-control" id="agama_edit" name="agama" required>
                        </div>
                        <div class="form-group">
                            <label for="status_keanggotaan_edit">Status Keanggotaan:</label>
                            <select class="form-control" id="status_keanggotaan_edit" name="status_keanggotaan" required>
                                <option value="">Pilih</option>
                                <option value="Anggota">Anggota</option>
                                <option value="Bukan Anggota">Bukan Anggota</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_gabung_edit">Tanggal Gabung:</label>
                            <input type="date" class="form-control" id="tanggal_gabung_edit" name="tanggal_gabung" required>
                        </div>
                        <div class="form-group">
                            <label for="photo_edit">photo:</label>
                            <input type="file" class="form-control-file" id="photo_edit" name="photo">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#dataTable').DataTable({
            "scrollX": true
        });

        $('#detailModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var no_kk = button.data('no-kk'); // Extract info from data-* attributes

            // Fetch data using AJAX
            $.ajax({
                url: "<?php echo base_url('admin/jemaat/detail'); ?>/" + no_kk,
                method: "GET",
                success: function(response) {
                    var data = JSON.parse(response);
                    var tableBody = $('#detailTableBody');
                    tableBody.empty();

                    data.forEach(function(row) {
                        var rowHtml = '<tr>' +
                            '<td>' + (row.jemaat_id || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.nama || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.peran_dalam_keluarga || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.anak_ke || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.tempat_lahir || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.tanggal_lahir || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.umur || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.jenis_kelamin || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.pendidikan_terakhir || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.pekerjaan || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.golongan_darah || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.pendonor || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.pelayanan ? JSON.parse(row.pelayanan).join(', ') : 'Belum ada Data') + '</td>' +
                            '<td>' + (row.tanggal_baptis || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.pendeta_baptis || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.tanggal_sidi || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.pendeta_sidi || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.tanggal_nikah || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.pendeta_nikah || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.pks_part || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.hp || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.email || 'Belum ada Data') + '</td>' +
                            '<td>' + (row.photo ? '<img src="<?php echo base_url('assets/images/'); ?>' + row.photo + '" alt="photo Jemaat" width="100">' : 'Tidak ada photo') + '</td>' +
                            '<td>' +
                            '<a href="<?php echo base_url('admin/jemaat/edit/'); ?>' + row.jemaat_id + '" class="btn btn-warning btn-sm">Edit</a>' +
                            '<a href="<?php echo base_url('admin/jemaat/hapus_jemaat/'); ?>' + row.jemaat_id + '" class="btn btn-danger btn-sm">Hapus</a>' +
                            '</td>' +
                            '</tr>';
                        tableBody.append(rowHtml);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        $('#detailTable').on('click', '.edit-btn', function() {
            var jemaat_id = $(this).data('id');

            // Fetch data using AJAX
            $.ajax({
                url: "<?php echo base_url('admin/jemaat/edit'); ?>/" + jemaat_id,
                method: "GET",
                success: function(response) {
                    var data = response.data;

                    // Set data to modal fields
                    $('#jemaat_id').val(data.id);
                    $('#gambar_lama').val(data.photo);
                    $('#no_kk_edit').val(data.no_kk);
                    $('#nama_kepala_keluarga_edit').val(data.nama_kepala_keluarga);
                    $('#nama_edit').val(data.nama);
                    $('#peran_dalam_keluarga_edit').val(data.peran_dalam_keluarga);
                    $('#anak_ke_edit').val(data.anak_ke);
                    $('#tempat_lahir_edit').val(data.tempat_lahir);
                    $('#tanggal_lahir_edit').val(data.tanggal_lahir);
                    $('#umur_edit').val(data.umur);
                    $('#jenis_kelamin_edit').val(data.jenis_kelamin);
                    $('#pendidikan_terakhir_edit').val(data.pendidikan_terakhir);
                    $('#pekerjaan_edit').val(data.pekerjaan);
                    $('#golongan_darah_edit').val(data.golongan_darah);
                    $('#pendonor_edit').val(data.pendonor);
                    $('#perjamuan_kudus_edit').val(data.perjamuan_kudus);
                    $('#no_hp_edit').val(data.no_hp);
                    $('#email_edit').val(data.email);
                    $('#status_perkawinan_edit').val(data.status_perkawinan);
                    $('#agama_edit').val(data.agama);
                    $('#status_keanggotaan_edit').val(data.status_keanggotaan);
                    $('#tanggal_gabung_edit').val(data.tanggal_gabung);

                    // Handle pelayanan checkboxes
                    var pelayanan = JSON.parse(data.pelayanan);
                    $('#baptis_edit').prop('checked', pelayanan.includes('Baptis'));
                    $('#sidi_edit').prop('checked', pelayanan.includes('Sidi'));
                    $('#nikah_edit').prop('checked', pelayanan.includes('Nikah'));
                    $('#pks_part_edit').prop('checked', pelayanan.includes('PKS/PART'));

                    // Handle tanggal baptis
                    if (pelayanan.includes('Baptis')) {
                        $('#baptis-group-edit').show();
                        $('#tanggal_baptis_edit').val(data.tanggal_baptis);
                        $('#pendeta_baptis-group-edit').show();
                        $('#pendeta_baptis_edit').val(data.pendeta_baptis);
                    } else {
                        $('#baptis-group-edit').hide();
                        $('#pendeta_baptis-group-edit').hide();
                    }

                    // Handle tanggal sidi
                    if (pelayanan.includes('Sidi')) {
                        $('#sidi-group-edit').show();
                        $('#tanggal_sidi_edit').val(data.tanggal_sidi);
                        $('#pendeta_sidi-group-edit').show();
                        $('#pendeta_sidi_edit').val(data.pendeta_sidi);
                    } else {
                        $('#sidi-group-edit').hide();
                        $('#pendeta_sidi-group-edit').hide();
                    }

                    // Handle tanggal nikah
                    if (pelayanan.includes('Nikah')) {
                        $('#nikah-group-edit').show();
                        $('#tanggal_nikah_edit').val(data.tanggal_nikah);
                        $('#pendeta_nikah-group-edit').show();
                        $('#pendeta_nikah_edit').val(data.pendeta_nikah);
                    } else {
                        $('#nikah-group-edit').hide();
                        $('#pendeta_nikah-group-edit').hide();
                    }

                    // Handle pks/part
                    if (pelayanan.includes('PKS/PART')) {
                        $('#pks_part-group-edit').show();
                        $('#pks_part_edit_select').val(data.pks_part);
                    } else {
                        $('#pks_part-group-edit').hide();
                    }

                    // Show edit modal
                    $('#editModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        $('#detailTable').on('click', '.delete-btn', function() {
            var jemaat_id = $(this).data('id');
            var jemaat_nama = $(this).data('nama');
            if (confirm('Apakah Anda yakin ingin menghapus jemaat ' + jemaat_nama + '?')) {
                // Delete data using AJAX
                $.ajax({
                    url: "<?php echo base_url('admin/jemaat/edit'); ?>/" + jemaat_id,
                    method: "GET",
                    success: function(response) {
                        alert('Data berhasil dihapus.' + jemaat_id);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting data:', error);
                        alert('Gagal menghapus data.' + jemaat_id);
                    }
                });
            }
        });

        // Handle checkbox changes to show/hide related fields
        $('#baptis_edit').change(function() {
            if ($(this).is(':checked')) {
                $('#baptis-group-edit').show();
            } else {
                $('#baptis-group-edit').hide();
            }
        });

        $('#sidi_edit').change(function() {
            if ($(this).is(':checked')) {
                $('#sidi-group-edit').show();
            } else {
                $('#sidi-group-edit').hide();
            }
        });

        $('#nikah_edit').change(function() {
            if ($(this).is(':checked')) {
                $('#nikah-group-edit').show();
            } else {
                $('#nikah-group-edit').hide();
            }
        });

        $('#pks_part_edit').change(function() {
            if ($(this).is(':checked')) {
                $('#pks_part-group-edit').show();
            } else {
                $('#pks_part-group-edit').hide();
            }
        });
    });

    // script modaladd
</script>