<div class="content-wrapper">
    <div id="page-content">
        <div class="section section_team">
            <div class="container">
                <div class="row align-self-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Form Rekam Medis</div>
                            <div class="card-body">

                                <div class="card-title">Form Rekam Medis</div>
                                <form action="<?= base_url('RekamMedis/store') ?>" method="post">
                                    <input type="hidden" name="id_dokter" id="id_dokter" value="<?= $this->session->userdata('idlogin'); ?>">
                                    <div class="form-group">
                                        <label for="id_pasien">Pasien</label>
                                        <select class="form-control" name="id_pasien" id="id_pasien">
                                            <option value="" disabled selected>Pilih Pasien</option>
                                            <?php foreach ($pasiens as $pasien) : ?>
                                                <option value="<?= $pasien->r_id ?>"><?= $pasien->r_fullname ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="golongan_darah">Golongan Darah</label>
                                        <select class="form-control" name="golongan_darah" id="golongan_darah">
                                            <option value="" disabled selected>Pilih Golongan Darah</option>
                                            <option value="A+">A+</option>
                                            <option value="A">A</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B">B</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB">AB</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tekanan_darah">Tekanan Darah</label>
                                        <input class="form-control" type="text" name="tekanan_darah" id="tekanan_darah">
                                    </div>
                                    <div class="form-group">
                                        <label for="suhu_tubuh">Suhu Tubuh</label>
                                        <input class="form-control" type="number" name="suhu_tubuh" id="suhu_tubuh">
                                    </div>
                                    <div class="form-group">
                                        <label for="tinggi_badan">Tinggi Badan</label>
                                        <input class="form-control" type="number" name="tinggi_badan" id="tinggi_badan">
                                    </div>
                                    <div class="form-group">
                                        <label for="berat_badan">Berat Badan</label>
                                        <input class="form-control" type="number" name="berat_badan" id="berat_badan">
                                    </div>
                                    <div class="form-group">
                                        <label for="alergi_makanan">Alergi Makanan</label>
                                        <textarea class="form-control" name="alergi_makanan" id="alergi_makanan" cols="20" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="alergi_obat">Alergi Obat</label>
                                        <textarea class="form-control" name="alergi_obat" id="alergi_obat" cols="20" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="keluhan">Keluhan</label>
                                        <textarea class="form-control" name="keluhan" id="keluhan" cols="20" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="diagnosa">Diagnosa</label>
                                        <textarea class="form-control" name="diagnosa" id="diagnosa" cols="20" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" id="keterangan" cols="20" rows="3"></textarea>
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
</div>