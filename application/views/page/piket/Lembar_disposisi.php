<div class="content">

	<!-- Start Content-->
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<div class="page-title-right">
						<?php $this->load->view('partials/breadcrumb'); ?>
					</div>
					<h4 class="page-title"><?= $titlePage ?></h4>
				</div>
			</div>
		</div>

        <?php $this->load->view('partials/alerts') ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form action="<?= base_url('pro_disposisi/' . $id_surat); ?>" method="POST"
								enctype="multipart/form-data">
							<div class="row mb-3">
								<div class="col-md-4">
									<label for="nomor_agenda" class="form-label">Nomor Agenda / Registrasi</label>
									<input type="text" class="form-control" id="nomor_agenda" name="nomor_agenda">
								</div>
								<div class="col-md-4">
									<label for="tanggal_penerimaan" class="form-label">Tanggal Penerimaan</label>
									<input type="date" class="form-control" id="tanggal_penerimaan" name="tanggal_penerimaan">
								</div>
								<div class="col-md-4">
									<label for="tanggal_surat" class="form-label">Tanggal dan Nomor Surat </label>
									<input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-4">
									<label for="dari" class="form-label">Dari</label>
									<input type="text" class="form-control" id="dari" name="dari">
								</div>
								<div class="col-md-4">
									<label for="ringkasan_surat" class="form-label">Hal / Ringkasan Isi Surat</label>
									 <textarea class="form-control" id="ringkasan_surat"  name="ringkasan_surat" rows="3"></textarea>
								</div>
								<div class="col-md-4">
									<label for="lampiran" class="form-label">Lampiran</label>
									 <textarea class="form-control" id="lampiran"  name="lampiran" rows="3"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label for="tanggal_penyelesaian" class="form-label">Tanggal Penyelesaian</label>
									<input type="date" class="form-control" id="tanggal_penyelesaian" name="tanggal_penyelesaian" >
								</div>
								<div class="col-md-4">
                                    <label class="form-label">Tingkat Keamanan</label>
                                    <br>
									<div class="form-check-inline">
										<input class="form-check-input" type="checkbox" name="Q6" id="sr"
											value="1">
										<label class="form-check-label" for="sr">
											SR
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="checkbox" name="Q7" id="r"
											value="1">
										<label class="form-check-label" for="r">
											R
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="checkbox" name="Q8" id="t"
											value="1">
										<label class="form-check-label" for="t">
											T
										</label>
									</div>
									<div class="form-check-inline">
										<input class="form-check-input" type="checkbox" name="Q9" id="b"
											value="1">
										<label class="form-check-label" for="b">
											B
										</label>
									</div>
								</div>
							</div>
                            <!-- <hr> -->
                            <div class="row mt-3" style="display: none;">
                                <h5>Disposisi Petunjuk</h5>
                                <div class="col-md-4 mt-1">
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="tindak_lanjuti" name="A17" value="1">
										<label class="form-check-label" for="tindak_lanjuti">Tindak Lanjuti / Laksanakan / Selesaikan</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="untuk_perhatian" name="A18" value="1">
										<label class="form-check-label" for="untuk_perhatian">Untuk Perhatian / Teruskan / Diketahui</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="laporkanKepadaSayaMonitor" name="A19" value="1">
										<label class="form-check-label" for="laporkanKepadaSayaMonitor">Laporkan Kepada Saya / Monitor</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="pendapatSaranTeguran" name="A20" value="1">
										<label class="form-check-label" for="pendapatSaranTeguran">Pendapat / Saran / Teguran</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="ingatkan_jaksanya" name="A21" value="1">
										<label class="form-check-label" for="ingatkan_jaksanya">Ingatkan Jaksanya</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="ingatkan_jaksanya" name="A22" value="1">
										<label class="form-check-label" for="ingatkan_jaksanya">Cek & ReCek Apakah Sudah Sesuai</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="untuk_dipedomani" name="A23" value="1">
										<label class="form-check-label" for="untuk_dipedomani">Untuk Dipedomani</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="datakan_rekap" name="A24" value="1">
										<label class="form-check-label" for="datakan_rekap">Datakan & Rekap utk BALAP Kejagung</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A25" value="1">
										<label class="form-check-label" for="">Terbitkan P.16 & Lengkapi ADM-Nya</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A26" value="1">
										<label class="form-check-label" for="">Serahkan / Beritahukan Jaksanya</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A27" value="1">
										<label class="form-check-label" for="">Pelajari Dengan Teliti dan Cermat</label>
									</div>
                                    <div class="form-check">
										<input class="form-check-input" type="checkbox" id="" name="A28" value="1">
										<label class="form-check-label" for="">JPU Tentukan Sikap Selama 5 Hari</label>
									</div>
								</div>
                                <div class="col-md-4 mt-1">
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A29" value="1">
										<label class="form-check-label" for="">Jaksa Buat BA Pendapat</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A30" value="1">
										<label class="form-check-label" for="">Pantau & Ikuti Perkembangannya</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A31" value="1">
										<label class="form-check-label" for="">Segera Jadwalkan Ekspose / Audiensi</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A32" value="1">
										<label class="form-check-label" for="">Telaah dan Pendapat</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A33" value="1">
										<label class="form-check-label" for="">Buat Renlid / Rendik</label>
									</div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="A34" value="1">
										<label class="form-check-label" for="">Perihal Perkara Apa / Siapa</label>
									</div>
                                    <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="" name="F17" value="1">
                                            <label class="form-check-label" for="">Dampingi / Wakili Saya  (Tidak Diwakilkan)</label>
                                    </div>
                                    <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="" name="F19" value="1">
                                            <label class="form-check-label" for="">Siapkan Konsep Laporannya</label>
                                    </div>
                                    <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="" name="F20" value="1">
                                            <label class="form-check-label" for="">Ketik / Gandakan / Simpan / Arsip</label>
                                    </div>
                                    <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="" name="F21" value="1">
                                            <label class="form-check-label" for="">Terbitkan SKPP berdasarkan RJ</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F22" value="1">
										<label class="form-check-label" for="">Segera Eksekusi & Lengkap ADM-Nya</label>
                                    </div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="" name="F23" value="1">
										<label class="form-check-label" for="">Periksa Catatan Administrasinya</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F24" value="1">
										<label class="form-check-label" for="">Untuk Data & Informasi</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F25" value="1">
										<label class="form-check-label" for="">Terbitkan Surat Perintah ..................</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F26" value="1">
										<label class="form-check-label" for="">Koordinasikan dengan ......................</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F27" value="1">
										<label class="form-check-label" for="">Untuk Seperlunya</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F28" value="1">
										<label class="form-check-label" for="">Ingat Batas Waktu ..........................</label>
                                    </div>
									<div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F29" value="1">
										<label class="form-check-label" for="">Serahkan Kepada Ybs .........................</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F30" value="1">
										<label class="form-check-label" for="">Umumkan Dipapan Pengumuman</label>
                                    </div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="F32" value="1">
										<label class="form-check-label" for="">Edarkan Kepada Pegawai, Kajari & Kacabjari</label>
                                    </div>
                                    <div class="form-check">
										<input class="form-check-input" type="checkbox" id="" name="F33" value="1">
										<label class="form-check-label" for="">Wakili Kajari….................................</label>
                                    </div>
                                </div>
                            </div>
                            <!-- <hr> -->
                            <div class="row mt-3" style="display: none;">
                                <h5>Diteruskan Kepada</h5>
                                <div class="col-md-6 mt-1">
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L17" value="1">
										<label class="form-check-label" for="">Wakil Kepala Kejaksaan Tinggi</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L19" value="1">
										<label class="form-check-label" for="asisten_pembinaan">Asisten Pembinaan</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L21" value="1">
										<label class="form-check-label" for="asisten_intelijen">Asisten Intelijen</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L23" value="1">
										<label class="form-check-label" for="">Asisten Tindak Pidana Umum</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L25" value="1">
										<label class="form-check-label" for="">Asisten Tindak Pidana Khusus</label>
									</div>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L27" value="1">
										<label class="form-check-label" for="">Asisten Perdata dan Tata Usaha</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L30" value="1">
										<label class="form-check-label" for="">Asisten Pidana Militer</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L32" value="1">
										<label class="form-check-label" for="">Asisten Pengawasan</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L34" value="1">
										<label class="form-check-label" for="">Kepala Bagian Tata Usaha</label>
									</div>
                                    <div class="form-check mb-2">
										<input class="form-check-input" type="checkbox" id="" name="L36" value="1">
										<label class="form-check-label" for="">Koordinator</label>
									</div>
                                </div>
                            </div>
							<button type="submit" class="btn btn-success waves-effect waves-light mt-3">Kirim</button>
						</form>

					</div> <!-- end card-body-->
				</div> <!-- end card-->
			</div>
		</div>


	</div> <!-- container -->

</div>