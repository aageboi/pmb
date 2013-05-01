<?php
if (is_array($data) && isset($data['tanggal_lahir']))
    list($data['thn'],$data['bln'],$data['tgl']) = explode('-',$data['tanggal_lahir']);

if (is_array($data) && isset($data['ortu']))
    list($data['ortu']['thn'],$data['ortu']['bln'],$data['ortu']['tgl']) = explode('-',$data['ortu']['tanggal_lahir']);
// debug($data);
?>
<form method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Formulir Pendaftaran</legend>
    </fieldset>
    <?php if (isset($data) && isset($data['id'])) { ?>
    <input type="hidden" name="id" value="<?=$data['id']?>">
    <?php } ?>
    <?php if (isset($data['ortu']) && isset($data['ortu']['id'])) { ?>
    <input type="hidden" name="id_ortu" value="<?=$data['ortu']['id']?>">
    <?php } ?>
    <?php if (isset($data['sekolahasal']) && isset($data['sekolahasal']['id'])) { ?>
    <input type="hidden" name="id_sekolah" value="<?=$data['sekolahasal']['id']?>">
    <?php } ?>
    <div class="row-fluid">
        <div class="span2">
            <?php if (isset($data['foto']) && ! empty($data['foto'])) { ?>
            <img src="<?=base_url()?>assets/img/upload/<?=$data['foto']?>" class="img-polaroid">
            <?php } else { ?>
            <img src="<?=base_url()?>assets/img/ava.jpg" class="img-polaroid">
            <?php } ?>
        </div>
        <div class="span10">
            <label class="control-label" style="text-align:left" for="foto">Upload foto anda:</label>
            <input type="file" name="foto">
            <span class="help-block">Ukuran foto maksimal 100Kb. Format foto: jpg, jpeg, png</span>
        </div>
    </div>
    <hr>
    <label class="control-label" style="text-align:left" for="jalur">Jalur yang anda pilih</label>
    <?php foreach ($jalur as $jal) { ?>
    <label class="checkbox inline">
        <input type="radio" name="jalur" value="<?=$jal->id?>" <?=(isset($data['id_jalur'])&&$data['id_jalur']==$jal->id)?'checked':''?>> <?=$jal->nama_jalur?>
    </label>
    <?php } ?>
    <hr>
    <div class="form-horizontal">
        <div class="control-group">
            <label class="control-label" style="text-align:left" for="pil_1">Pilihan Utama</label>
            <div class="controls">
                <select name="pil1" id="pil_1">
                    <?php foreach ($prodi as $ps) { ?>
                    <option value="<?=$ps->id?>" <?=(isset($data['pil_1'])&&$data['pil_1']==$ps->id)?'selected':''?>><?=$ps->nama_prodi?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" style="text-align:left" for="pil_2">Pilihan Kedua</label>
            <div class="controls">
                <select name="pil2" id="pil_2">
                    <?php foreach ($prodi as $ps) { ?>
                    <option value="<?=$ps->id?>" <?=(isset($data['pil_2'])&&$data['pil_2']==$ps->id)?'selected':''?>><?=$ps->nama_prodi?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <h6>I. DATA PRIBADI CALON MAHASISWA</h6>
    <div class="form-horizontal">
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="nama">Nama (sesuai akte lahir)</label>
            <div class="controls">
                <input type="text" name="nama" class="span10" value="<?=isset($data['nama'])?$data['nama']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="tempat">Tempat Lahir</label>
            <div class="controls">
                <input type="text" name="tempat" class="span5" value="<?=isset($data['tempat_lahir'])?$data['tempat_lahir']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="ttl">Tgl/Bln/Tahun Lahir</label>
            <div class="controls">
                <input type="text" id="ttl" name="tgl" class="span1" value="<?=isset($data['tgl'])?$data['tgl']:''?>"> /
                <input type="text" id="ttl" name="bln" class="span1" value="<?=isset($data['bln'])?$data['bln']:''?>"> /
                <input type="text" id="ttl" name="thn" class="span2" value="<?=isset($data['thn'])?$data['thn']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="jekl">Jenis Kelamin</label>
            <div class="controls">
                <select name="jkel">
                    <?php foreach ($jenkel as $jk) { ?>
                    <option value="<?=$jk->id?>" <?=(isset($data['id_jenkel'])&&$data['id_jenkel']==$jk->id)?'selected':''?>><?=$jk->jenkel?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="agama">Agama</label>
            <div class="controls">
                <select name="agama">
                    <?php foreach ($agama as $agm) { ?>
                    <option value="<?=$agm->id?>" <?=(isset($data['id_agama'])&&$data['id_agama']==$agm->id)?'selected':''?>><?=$agm->agama?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="nikah">Status Perkawinan</label>
            <div class="controls">
                <select name="nikah">
                    <?php foreach ($nikah as $nkh) { ?>
                    <option value="<?=$nkh->id?>" <?=(isset($data['id_nikah'])&&$data['id_nikah']==$nkh->id)?'selected':''?>><?=$nkh->status?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="biaya">Sumber Biaya</label>
            <div class="controls">
                <select name="sumber">
                    <?php foreach ($biaya as $bia) { ?>
                    <option value="<?=$bia->id?>" <?=(isset($data['id_sumber'])&&$data['id_sumber']==$bia->id)?'selected':''?>><?=$bia->sumber_biaya?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="kwn">Kewarganegaraan</label>
            <div class="controls">
                <select name="kwn">
                    <?php foreach ($kewarganegaraan as $kwn) { ?>
                    <option value="<?=$kwn->id?>" <?=(isset($data['id_kwn'])&&$data['id_kwn']==$kwn->id)?'selected':''?>><?=$kwn->kewarganegaraan?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="alamat">Alamat</label>
            <div class="controls">
                <input type="text" name="alamat" class="span10" value="<?=isset($data['alamat'])?$data['alamat']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="kelurahan">Kelurahan</label>
            <div class="controls">
                <input type="text" name="kelurahan" class="span5" value="<?=isset($data['kelurahan'])?$data['kelurahan']:''?>">
                &nbsp;RT / RW
                <input type="text" name="rt" class="span2" value="<?=isset($data['rt'])?$data['rt']:''?>"> /
                <input type="text" name="rw" class="span2" value="<?=isset($data['rw'])?$data['rw']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="kota">Kota</label>
            <div class="controls">
                <input type="text" name="kota" class="span5" value="<?=isset($data['kota'])?$data['kota']:''?>">
                &nbsp;Kodepos
                <input type="text" name="kodepos" class="span3" value="<?=isset($data['kode_pos'])?$data['kode_pos']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="kota">Provinsi</label>
            <div class="controls">
                <select name="provinsi">
                    <?php foreach ($provinsi as $prov) { ?>
                    <option value="<?=$prov->id?>"><?=$prov->nama_provinsi?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="telp">Telp</label>
            <div class="controls">
                <input type="text" name="telp" class="span4" value="<?=isset($data['telp'])?$data['telp']:''?>">
                &nbsp;HP
                <input type="text" name="hp" class="span4" value="<?=isset($data['hp'])?$data['hp']:''?>">
            </div>
        </div>
    </div>
    <hr>
    <h6>II. DATA SEKOLAH</h6>
    <div class="form-horizontal">
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="sekolah">Nama SMTA</label>
            <div class="controls">
                <select name="sekolah" id="sekolah">
                    <?php foreach ($sekolah as $sekolah) { ?>
                    <option value="<?=$sekolah->id?>" value="<?=(isset($data['sekolahasal'])&&$data['sekolahasal']['id_sekolah']==$sekolah->id)?'selected':''?>"><?=$sekolah->nama_sekolah.' - '.$sekolah->kota?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="jurusan">Kode Jurusan SMTA</label>
            <div class="controls">
                <select name="jurusan" id="jurusan">
                    <?php foreach ($jurusan as $jurusan) { ?>
                    <option value="<?=$jurusan->id?>" <?=(isset($data['sekolahasal'])&&$data['sekolahasal']['id_jurusan']==$jurusan->id)?'selected':''?>><?=$jurusan->nama_jurusan?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="thnlulus">Tahun Lulus</label>
            <div class="controls">
                <input type="text" name="tahun_lulus" class="span2" value="<?=isset($data['sekolahasal'])?$data['sekolahasal']['tahun_lulus']:''?>">
            </div>
        </div>
    </div>
    <hr>
    <h6>III. DATA ORANG TUA / WALI (YANG DAPAT DIHUBUNGI)</h6>
    <div class="form-horizontal">
        <div class="control-group">
            <label class="radio inline span3">
                <input type="radio" value="ayah" name="ortu" <?=(isset($data['ortu'])&&$data['ortu']['is_ortu']=='ayah')?'checked':''?>> Ayah
            </label>
            <label class="radio inline span3">
                <input type="radio" value="ibu" name="ortu" <?=(isset($data['ortu'])&&$data['ortu']['is_ortu']=='ibu')?'checked':''?>> Ibu
            </label>
            <label class="radio inline span3">
                <input type="radio" value="wali" name="ortu" <?=(isset($data['ortu'])&&$data['ortu']['is_ortu']=='wali')?'checked':''?>> Wali
            </label>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="nama_ortu">Nama</label>
            <div class="controls">
                <input type="text" name="nama_ortu" class="span10" value="<?=isset($data['ortu'])?$data['ortu']['nama']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="ttl_ortu">Tgl/Bln/Tahun Lahir</label>
            <div class="controls">
                <input type="text" name="tgl_ortu" class="span1" value="<?=isset($data['ortu']['tgl'])?$data['ortu']['tgl']:''?>"> /
                <input type="text" name="bln_ortu" class="span1" value="<?=isset($data['ortu']['bln'])?$data['ortu']['bln']:''?>"> /
                <input type="text" name="thn_ortu" class="span2" value="<?=isset($data['ortu']['thn'])?$data['ortu']['thn']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="pekerjaan_ortu">Pekerjaan</label>
            <div class="controls">
                <select name="pekerjaan_ortu" id="pekerjaan_ortu">
                    <?php foreach ($pekerjaan as $pekerjaan) { ?>
                    <option value="<?=$pekerjaan->id?>" <?=(isset($data['ortu'])&&$data['ortu']['id_pekerjaan']==$pekerjaan->id)?'selected':''?>><?=$pekerjaan->nama_pekerjaan?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="pendidikan_ortu">Pendidikan Terakhir</label>
            <div class="controls">
                <select name="pendidikan_ortu" id="pendidikan_ortu">
                    <?php foreach ($pendidikan as $pendidikan) { ?>
                    <option value="<?=$pendidikan->id?>" <?=(isset($data['ortu'])&&$data['ortu']['id_pendidikan']==$pendidikan->id)?'selected':''?>><?=$pendidikan->pendidikan?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="alamat_ortu">Alamat</label>
            <div class="controls">
                <input type="text" name="alamat_ortu" class="span10" value="<?=isset($data['ortu'])?$data['ortu']['alamat']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="kelurahan_ortu">Kelurahan</label>
            <div class="controls">
                <input type="text" name="kelurahan_ortu" class="span5" value="<?=isset($data['ortu'])?$data['ortu']['kelurahan']:''?>">
                &nbsp;RT / RW
                <input type="text" name="rt_ortu" class="span2" value="<?=isset($data['ortu'])?$data['ortu']['rt']:''?>"> /
                <input type="text" name="rw_ortu" class="span2" value="<?=isset($data['ortu'])?$data['ortu']['rw']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="kota_ortu">Kota</label>
            <div class="controls">
                <input type="text" name="kota_ortu" class="span5" value="<?=isset($data['ortu'])?$data['ortu']['kota']:''?>">
                &nbsp;Kodepos
                <input type="text" name="kodepos_ortu" class="span3" value="<?=isset($data['ortu'])?$data['ortu']['kode_pos']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="provinsi_ortu">Provinsi</label>
            <div class="controls">
                <select name="provinsi_ortu">
                    <?php foreach ($provinsi as $prov) { ?>
                    <option value="<?=$prov->id?>" <?=(isset($data['ortu'])&&$data['ortu']['id_provinsi']==$prov->id)?'selected':''?>><?=$prov->nama_provinsi?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="telp_ortu">Telp</label>
            <div class="controls">
                <input type="text" name="telp_ortu" class="span4" value="<?=isset($data['ortu'])?$data['ortu']['telp']:''?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="ttd_1">Tanda tangan</label>
            <div class="controls">
                <input type="file" name="ttd_1">
                <span class="help-block offset1">Ukuran foto maksimal 100Kb. Format foto: jpg, jpeg, png</span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label span4" style="text-align:left" for="ttd_1">Tanda tangan orang tua</label>
            <div class="controls">
                <input type="file" name="ttd_2">
                <span class="help-block offset1">Ukuran foto maksimal 100Kb. Format foto: jpg, jpeg, png</span>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn">Batal</button>
    </div>
</form>
