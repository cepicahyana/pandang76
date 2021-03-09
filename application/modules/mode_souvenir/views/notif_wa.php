<div id="area_formSubmit54">
    <form class="form-horizontal" id="formSubmit54" action="javascript:submitFormNoResset('formSubmit54')" method="post" url="<?php echo base_url() ?>konfigurasi/save_">
        <input type="hidden" value="54" name="idpengaturan">
        <b> Notif Whatsapp Pengambilan Souvenir</b><br>
        <textarea id="val_54" class='form-control' name="idkonten"><?php echo $this->m_reff->goField("tm_pengaturan", "val", "where id='54' "); ?></textarea>
        <button onclick='submitFormNoResset("formSubmit54")' class="btn btn-block btn-primary">SIMPAN</button>
    </form>
</div>

<script>
    CKEDITOR.replace('val_54');
    // CKEDITOR.config.height = 220;
    CKEDITOR.config.width = 1300;
</script>