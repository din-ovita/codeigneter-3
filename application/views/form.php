<form action="<?php echo base_url('ppdb/aksi_tambah_pendaftar_ppdb') ?>" enctype="multipart/form-data" method="post" class="my-10">
                <?php if ($data) :
                    $row2 = $data[0]; ?>
                    <div class="md:grid md:grid-cols-4 gap-7 my-2">
                        <div>
                            <label for="ta" class="font-semibold">Tahun Ajaran</label>
                            <div class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                                <p><?php echo ta($row2->id_angkatan) ?></p>
                            </div>
                        </div>
                        <div>
                            <label for="tgl_daftar" class="font-semibold">Tanggal Daftar</label>
                            <input type="date" name="tgl_daftar" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" value="<?= $row2->tgl_daftar ?>" disabled>
                        </div>
                        <div>
                            <label for="id_jenjang" class="font-semibold">Jenjang</label>
                            <div class="my-2">
                                <input type="text" value="<?php echo $data_jenjang[0]->nama_jenjang ?>" class="form-control" disabled required>
                                <input type="text" name="id_jenjang" value="<?php echo $data_jenjang[0]->id_jenjang ?>" class="form-control" hidden required>
                            </div>
                        </div>
                        <div>
                            <label for="asal_sekolah" class="font-semibold">Asal Sekolah</label>
                            <div class="<?= $data ? '' : 'hidden' ?>block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                                <p><?php echo $row2->asal_sekolah ?></p>
                            </div>
                            <input type="text" name="asal_sekolah" required class="<?= $data ? 'hidden' : '' ?> block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="SMP N 1">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label for="nik" class="font-semibold">No NIK</label>
                            <div class="<?= $data ? '' : 'hidden' ?> block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                                <p><?php echo $row2->nik ?></p>
                            </div>
                            <input type="text" name="nik" required class="<?= $data ? 'hidden' : '' ?> block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="NIK Siswa">
                        </div>
                        <div>
                            <label for="kk" class="font-semibold">No KK</label>
                            <div class="<?= $data ? '' : 'hidden' ?> block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                                <p><?php echo $row2->kk ?></p>
                            </div>
                            <input type="text" name="kk" required class="<?= $data ? 'hidden' : '' ?> block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="No KK">
                        </div>
                        <div>
                            <label for="nisn" class="font-semibold">NISN</label>
                            <div class="<?= $data ? '' : 'hidden' ?> block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                                <p><?php echo $row2->nisn ?></p>
                            </div>
                            <input type="text" name="nisn" required class="<?= $data ? 'hidden' : '' ?> block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="NISN">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label for="nama" class="font-semibold">Nama Lengkap</label>
                            <input type="text" name="nama" value="<?php echo $row2->nama ?>" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Nama Siswa">
                        </div>
                        <div>
                            <label for="jekel" class="font-semibold">Jenis Kelamin</label>
                            <div class="<?= $data ? '' : 'hidden' ?> block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                                <p><?php echo $row2->jekel ?></p>
                            </div>
                        </div>
                        <div>
                            <label for="agama" class="font-semibold">Agama</label>
                            <div class="<?= $data ? '' : 'hidden' ?> block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                                <p><?php echo $row2->agama ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label for="tempat_lahir" class="font-semibold">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" disabled placeholder="Tempat Lahir" value="<?= $row2->tempat_lahir ?>">
                        </div>
                        <div>
                            <label for="tgl_lahir" class="font-semibold">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" disabled value="<?= $row2->tgl_lahir ?>">
                        </div>
                        <div>
                            <label for="anak_ke" class="font-semibold">Anak ke</label>
                            <input type="number" name="anak_ke" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" disabled placeholder="1" value="<?= $row2->anak_ke ?>">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label class="font-semibold" for="foto">Pas Foto</label>
                            <p class="py-2 px-3 my-2 mt-3 font-semibold rounded-full bg-cyan-50 text-cyan-700">Sudah Upload</p>
                        </div>
                        <div>
                            <label class="font-semibold" for="skhu">Foto SKHU</label>
                            <p class="py-2 px-3 my-2 mt-3 font-semibold rounded-full bg-cyan-50 text-cyan-700">Sudah Upload</p>
                        </div>
                        <div>
                            <label for="no_tlp" class="font-semibold">No Telepon</label>
                            <input type="text" name="no_tlp" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" disabled value="<?= $row2->telepon ?>" placeholder="No Telepon">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label for="nama_ayah" class="font-semibold">Nama Ayah</label>
                            <input type="text" name="nama_ayah" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" placeholder="Nama Ayah" disabled value="<?= $row2->ayah ?>">
                        </div>
                        <div>
                            <label for="pekerjaan_ayah" class="font-semibold">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" placeholder="Pekerjaan Ayah" disabled value="<?= $row2->pekerjaan_ayah ?>">
                        </div>
                        <div>
                            <label for="gaji_ayah" class="font-semibold">Gaji Ayah</label>
                            <input type="text" name="pekerjaan_ayah" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" placeholder="Pekerjaan Ayah" disabled value="<?= $row2->gaji_ayah ?>">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label for="nama_ibu" class="font-semibold">Nama Ibu</label>
                            <input type="text" name="nama_ibu" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" placeholder="Nama Ibu" disabled value="<?= $row2->ibu ?>">
                        </div>
                        <div>
                            <label for="pekerjaan_ibu" class="font-semibold">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" placeholder="Pekerjaan Ibu" disabled value="<?= $row2->pekerjaan_ibu ?>">
                        </div>
                        <div>
                            <label for="gaji_ibu" class="font-semibold">Gaji Ibu</label>
                            <input type="text" name="pekerjaan_ayah" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" placeholder="Pekerjaan Ayah" disabled value="<?= $row2->gaji_ibu ?>">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label class="font-semibold" for="jurusan">Jurusan (Pilih salah satu)</label>
                            <input type="text" name="pekerjaan_ayah" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" placeholder="Pekerjaan Ayah" disabled value="<?= $row2->jurusan ?>">
                        </div>
                        <div>
                            <label class="font-semibold" for="gelombang_pendaftaran">Gelombang Pendaftaran</label>
                            <input type="text" name="pekerjaan_ayah" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" placeholder="Pekerjaan Ayah" disabled value="<?= $row2->gelombang_daftar ?>">
                        </div>
                        <div>
                            <label class="font-semibold" for="info">Sumber Info Pendaftaran</label>
                            <input type="text" name="pekerjaan_ayah" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" placeholder="Pekerjaan Ayah" disabled value="<?= $row2->sumber_info_pendaftaran ?>">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 gap-12 my-2">
                        <div class="mb-2">
                            <label class="font-semibold" for="status_tinggal">Status Tinggal</label>
                            <input type="text" name="status_tinggal" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" placeholder="Pekerjaan Ayah" disabled value="<?= $row2->status_tinggal ?>">
                        </div>
                        <div class="mb-2">
                            <label class="font-semibold" for="status_tinggal">Email</label>
                            <input type="text" name="pekerjaan_ayah" required class="block rounded-sm p-2 w-full my-2 bg-gray-50" disabled value="<?= $row2->email ?>">
                        </div>
                    </div>
                    <div>
                        <label class="font-semibold" for="alamat">Alamat Lengkap</label>
                        <textarea name="alamat" id="almat" cols="100" rows="4" class="block rounded-sm p-2 w-full my-2 bg-gray-50" disabled><?= $row2->alamat ?></textarea>
                    </div>
                    <div class="mt-8">
                        <h5 class="font-semibold text-red-600"><span>* </span>Note</h5>
                        <p class="text-md"><span class="text-red-600">* </span>Perubahan data bisa dilakukan sebelum di verifikasi</p>
                        <p class="text-md"><span class="text-red-600">* </span>Pastikan data yang diisi sesuai dengan identitas Anda</p>
                        <p class="text-md"><span class="text-red-600">* </span>Sebelum dikirim pastikan data yang diisi udah benar</p>
                    </div>
                    <button type="<?= $data ? 'button' : 'submit' ?>" class="<?= $data ? 'hidden' : '' ?> bg-cyan-500 w-full p-2 text-white font-semibold uppercase mt-8 rounded-sm text-lg focus:outline-none focus:ring focus:ring-cyan-400">Kirim</button>
                <?php else : ?>
                    <div class="md:grid md:grid-cols-3 gap-7 my-2">
                        <div>
                            <label for="ta" class="font-semibold">Tahun Ajaran</label>
                            <select name="id_angkatan" id="ta" class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" data-dropdown-css-class="select2-info" required>
                                <?php $id = 0;
                                foreach ($tahun_ajaran_aktif as $row) : $id++; ?>
                                    <option value="<?php echo $row->id_angkatan ?>"><?php echo $row->kd_angkatan ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div>
                            <label for="id_jenjang" class="font-semibold">Jenjang</label>
                            <div class="my-2">
                                <input type="text" value="<?php echo $data_jenjang[0]->nama_jenjang ?>" class="form-control" disabled required>
                                <input type="text" name="id_jenjang" value="<?php echo $data_jenjang[0]->id_jenjang ?>" class="form-control" hidden required>
                            </div>
                        </div>
                        <div>
                            <label for="asal_sekolah" class="font-semibold">Asal Sekolah</label>

                            <input type="text" name="asal_sekolah" required class=" block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Asal Sekolah">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label for="nik" class="font-semibold">No NIK</label>

                            <input type="text" name="nik" required class=" block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="NIK Siswa">
                        </div>
                        <div>
                            <label for="kk" class="font-semibold">No KK</label>

                            <input type="text" name="kk" required class=" block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="No KK">
                        </div>
                        <div>
                            <label for="nisn" class="font-semibold">NISN</label>

                            <input type="text" name="nisn" required class=" block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="NISN">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label for="nama" class="font-semibold">Nama Lengkap</label>
                            <input type="text" name="nama" value="" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Nama Siswa">
                        </div>
                        <div>
                            <label for="jekel" class="font-semibold">Jenis Kelamin</label>
                            <div class="d-flex my-3">
                                <div class="form-check mr-3">
                                    <input class="form-check-input" value="Laki_laki" type="radio" name="gender" id="jekel" required>
                                    <label class="form-check-label" for="jekel">
                                        Laki-Laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Perempuan" type="radio" name="gender" id="jekel1" required>
                                    <label class="form-check-label" for="jekel1">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="agama" class="font-semibold">Agama</label>
                            <select name="agama" id="ta" class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" data-dropdown-css-class="select2-info" required>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Kong Hu Chu">Kong Hu Chu</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label for="tempat_lahir" class="font-semibold">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Tempat Lahir">
                        </div>
                        <div>
                            <label for="tgl_lahir" class="font-semibold">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                        </div>
                        <div>
                            <label for="anak_ke" class="font-semibold">Anak ke</label>
                            <input type="number" name="anak_ke" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Anak ke-" min="1">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label class="font-semibold" for="foto">Pas Foto</label>
                            <input type="file" class="block rounded-sm p-2 w-full my-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100" name="foto">
                        </div>
                        <div>
                            <label class="font-semibold" for="skhu">Foto SKHU</label>
                            <input type="file" class="block rounded-sm p-2 w-full my-2 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100" name="skhu">
                        </div>
                        <div>
                            <label for="no_tlp" class="font-semibold">No Telepon</label>
                            <input type="text" name="no_tlp" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="No Telepon">
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label for="nama_ayah" class="font-semibold">Nama Ayah</label>
                            <input type="text" name="nama_ayah" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Nama Ayah">
                        </div>
                        <div>
                            <label for="pekerjaan_ayah" class="font-semibold">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Pekerjaan Ayah">
                        </div>
                        <div>
                            <label for="gaji_ayah" class="font-semibold">Gaji Ayah</label>
                            <select name="gaji_ayah" id="ta" class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" data-dropdown-css-class="select2-info" required>
                                <option value="Kurang dari 1jt">Kurang dari 1jt</option>
                                <option value="1jt-2jt">1jt-2jt</option>
                                <option value="2jt-3jt">2jt-3jt</option>
                                <option value="3jt-4jt">3jt-4jt</option>
                                <option value="4jt-5jt">4jt-5jt</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label for="nama_ibu" class="font-semibold">Nama Ibu</label>
                            <input type="text" name="nama_ibu" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Nama Ibu">
                        </div>
                        <div>
                            <label for="pekerjaan_ibu" class="font-semibold">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Pekerjaan Ibu">
                        </div>
                        <div>
                            <label for="gaji_ibu" class="font-semibold">Gaji Ibu</label>
                            <select name="gaji_ibu" id="ta" class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" data-dropdown-css-class="select2-info" required>
                                <option value="Kurang dari 1jt">Kurang dari 1jt</option>
                                <option value="1jt-2jt">1jt-2jt</option>
                                <option value="2jt-3jt">2jt-3jt</option>
                                <option value="3jt-4jt">3jt-4jt</option>
                                <option value="4jt-5jt">4jt-5jt</option>
                            </select>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-3 gap-12 my-2">
                        <div>
                            <label class="font-semibold" for="jurusan">Jurusan (Pilih salah satu)</label>
                            <select name="jurusan" id="jurusan" class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                                <optgroup label="Jurusan Reguler">
                                    <option value="Akuntansi dan Keuangan Lembaga">Akuntansi dan Keuangan Lembaga</option>
                                    <option value="Tata Busana">Tata Busana</option>
                                    <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                </optgroup>
                                <optgroup label="Jurusan Khusus">
                                    <option value="Komputer Networking">Komputer Networking</option>
                                    <option value="Komputer Pemrograman">Komputer Pemrograman</option>
                                    <option value="Komputer Multimedia">Komputer Multimedia</option>
                                </optgroup>
                            </select>
                        </div>
                        <div>
                            <label class="font-semibold" for="info">Sumber Info Pendaftaran</label>
                            <select name="sumber_info_pendaftaran" id="info" class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                                <option value="Guru BK SMP/MTs">Guru BK SMP/MTs</option>
                                <option value="Tim Presentasi Sekolah">Tim Presentasi Sekolah</option>
                                <option value="Tim Visit di Rumah">Tim Visit di Rumah</option>
                                <option value="Teman Satu Sekolah">Teman Satu Sekolah</option>
                                <option value="Teman Main">Teman Main</option>
                                <option value="Media Sosial">Media Sosial</option>
                            </select>
                        </div>
                        <div>
                            <label for="email" class="font-semibold">Masukkan Email</label>
                            <input type="email" name="email" required class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Masukkan Email">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label class="font-semibold" for="status_tinggal">Status Tinggal</label>
                        <select name="status_tinggal" id="status_tinggal" class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400">
                            <option selected>Pilih</option>
                            <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                            <option value="Tempat Kos">Tempat Kos</option>
                            <option value="Pondok Pesantren">Pondok Pesantren</option>
                            <option value="Asrama">Asrama</option>
                            <option value="Bersama Wali">Bersama Wali</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-semibold" for="alamat">Alamat Lengkap</label>
                        <textarea name="alamat" id="almat" cols="100" rows="4" class="block rounded-sm p-2 w-full my-2 bg-gray-50 focus:outline-none focus:ring focus:ring-cyan-400" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="mt-8">
                        <h5 class="font-semibold text-red-600"><span>* </span>Note</h5>
                        <p class="text-md"><span class="text-red-600">* </span>Perubahan data bisa dilakukan sebelum di verifikasi</p>
                        <p class="text-md"><span class="text-red-600">* </span>Pastikan data yang diisi sesuai dengan identitas Anda</p>
                        <p class="text-md"><span class="text-red-600">* </span>Sebelum dikirim pastikan data yang diisi sudah benar</p>
                    </div>
                    <button type="<?= $data ? 'button' : 'submit' ?>" class="<?= $data ? 'hidden' : '' ?> bg-cyan-500 w-full p-2 text-white font-semibold uppercase mt-8 rounded-sm text-lg focus:outline-none focus:ring focus:ring-cyan-400">Kirim</button>
                <?php endif ?>
                <?php foreach ($data as $row2) : ?>
                    <!-- <?php var_dump($row2) ?> -->
                <?php endforeach; ?>
            </form>
