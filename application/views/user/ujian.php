<?=$this->load->view('header')?>
<div class="row-fluid">
    <div class="span12">
        <h2>Soal Ujian</h2>
        <?=$this->load->view('error_message')?>
        
        <form method="post">
            <ol>
            <?php $i=1;
            if ($data)
            foreach ($data as $key => $row) {
            ?>
            <li>
                <p><?=$row->isi_soal?></p>
                <input type="radio" name="jawaban[<?=$row->id?>]" value="a">&nbsp;a. <?=$row->isi_pilihan_a?><br>
                <input type="radio" name="jawaban[<?=$row->id?>]" value="b">&nbsp;b. <?=$row->isi_pilihan_b?><br>
                <input type="radio" name="jawaban[<?=$row->id?>]" value="c">&nbsp;c. <?=$row->isi_pilihan_c?><br>
                <input type="radio" name="jawaban[<?=$row->id?>]" value="d">&nbsp;d. <?=$row->isi_pilihan_d?><br><br>
            </li>
            <?php
                $i++;
            }
            ?>
            </ol>
            
            <br><br>
            <input type="submit" value="Submit">
            
        </form>
    </div>
</div>
<hr>
<?=$this->load->view('footer')?>
