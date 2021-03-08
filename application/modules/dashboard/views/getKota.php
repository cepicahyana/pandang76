<?php
    $id_provinsi = $_POST["id"];
    
    $this->db->where("id_prov", $id_provinsi);
    $this->db->order_by("jml", "DESC");
    $d = $this->db->get("v_kab")->result();
    
    $x = "";
    $no = 1;
    $total = 0;
    foreach($d as $v){
        $x.="
            <tr>
                <td align='center'>".$no."</td>
                <td>".ucwords(strtolower($v->nama))."</td>
                <td align='center'>".$v->jml."</td>
            </tr>
        ";
        $no++;
        
        $total = $total + $v->jml;
    }
?>

<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="entry">
                <tr>
                    <th width="5%">NO</th>
                    <th>NAMA KOTA / KABUPATEN</th>
                    <th width="20%"> JML PEMOHON</th>
                </tr>
                <?php echo $x;?>
                <tr>
                    <td colspan="2" align='center'><strong>TOTAL PERMOHONAN</strong></td>
                    <td align='center'><?php echo $total;?></td>
                </tr>
            </table>
        </div>
    </div>
</div>