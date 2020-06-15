<?php 

?>
<div id='divBantuan'>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Bantuan Cepat</h4>
                </div>
                <div class="card-body">
                    <?php foreach($data['bantuan'] as $ban) : 
                        $id     = $ban['id'];
                        $judul  = $ban['judul'];
                        $deks   = $ban['deks'];
                    ?>
                    <div id="accordion">
                        <div class="accordion">
                            <div class="accordion-header collapsed" role="button" data-toggle="collapse"
                                data-target="#panel-body-<?=$id; ?>" aria-expanded="false">
                                <h4><?=$judul; ?></h4>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-<?=$id; ?>" data-parent="#accordion">
                                <p class="mb-0" style="text-align: justify;"><?=$deks; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Bantuan ke tim Haxorsprogramming</h4>
                </div>
                <div class="card-body">
                    <p>
                        Silahkan kirim email ke <a href='mailto:alditha.forum@gmail.com'>alditha.forum@gmail.com</a> untuk bertanya seputar aplikasi ini
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>