<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/adminlte.min.css">

<div class="box box-info direct-chat direct-chat-info">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $member['r_fullname'] ?></h3>
    <br>
    <?php echo date('d-m-Y', strtotime($member['r_bday'])) ?>

    <div class="box-tools pull-right">
      <a class="readmore-btn" href="<?php echo base_url() ?>konsultasidokter">
        <i style="color:#ffffff;" class="fa fa-arrow-left"></i>
      </a>
    </div>
  </div>
  <div class="box-body">
    <div class="direct-chat-messages" id="content-chat">
      <?php
      if ($datachat) :
        $out = '';

        foreach ($datachat as $dc) :
          if ($dc['created_by'] == 'D') {
            $gambar       = $this->session->userdata('image');
            $sisi_direct  = 'right';
            $float        = 'style="float: none !important;"';
            $sisi_pull    = 'right';
          } else {
            $gambar       = 'member/' . $member['r_image'];
            $sisi_direct  = '';
            $float        = '';
            $sisi_pull    = 'left';
          }
          $out .= ' <div class="direct-chat-msg ' . $sisi_direct . '" ' . $float . '>
                          <div class="direct-chat-info clearfix" style="text-align: ' . $sisi_pull . ';">
                            <span class="direct-chat-timestamp">
                              ' . date('d-m-Y h:i:s', strtotime($dc['created_on'])) . '
                            </span>
                          </div>
                          <img class="direct-chat-img" src="' . base_url() . 'image/' . $gambar . '" alt="img-profile">
                          <div class="direct-chat-text">';
          if ($dc['created_by'] == 'D') {
            $out .= '<i class="fa fa-times" onclick="del(' . $dc['c_id'] . ')"></i> <br>';
          }
          $out .= nl2br($dc['c_value']) . '
                            <br>
                          </div>
                        </div>';
        endforeach;
        echo $out;
      endif;
      ?>
    </div>
  </div>
  <div class="box-footer">
    <form action="#" method="post" id="frm-msg">
      <textarea name="message" id="message" class="form-control" required></textarea>
      <span id="btn-save">
        <a class="btn" style="width: 100%;" onclick="save()">
          <i class="fa fa-paper-plane"></i>
        </a>
      </span>
    </form>
  </div>
</div>
<script type="text/javascript">
  const messages = document.getElementById('content-chat');

  function scrollToBottom() {
    messages.scrollTop = messages.scrollHeight;
  }

  scrollToBottom();

  function save() {
    $('#btn-save').html('<a class="btn btn-outline-secondary" style="width: 100%;background-color: #cacaca;cursor: no-drop;"><i class="fa fa-spinner"></i></a>');
    $.post('<?php echo base_url() ?>konsultasidokter/save', {
      m_id: "<?php echo $member['r_id'] ?>",
      image: "<?php echo $member['r_image'] ?>",
      message: $message = $('#message').val()
    }, function(result) {
      result.SuccessMsg
      $('#content-chat').html(result.content);
      $('#message').val('');
      $('#btn-save').html('<a class="btn" style="width: 100%;" onclick="save()"><i class="fa fa-paper-plane"></i></a>');
      scrollToBottom();
    }, 'json');
  }


  function del($id) {
    swal({
        title: "Hapus chat ini ?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        $.post('<?php echo base_url() ?>konsultasidokter/hapus', {
          id: $id
        }, function(result) {
          reload();
          scrollToBottom();
          swal("Chat sudah dihapus!", {
            icon: "success",
          });
        }, 'json');
      });
  }

  function reload() {
    $.post('<?php echo base_url() ?>konsultasidokter/reload', {
      m_id: "<?php echo $member['r_id'] ?>",
      image: "<?php echo $member['r_image'] ?>"
    }, function(result) {
      $('#content-chat').html(result.content);
    }, 'json');
  }

  setInterval(function() {
    $.post('<?php echo base_url() ?>konsultasidokter/reload', {
      m_id: "<?php echo $member['r_id'] ?>",
      image: "<?php echo $member['r_image'] ?>"
    }, function(result) {
      $('#content-chat').html(result.content);
    }, 'json');
    scrollToBottom();
  }, 20000);
</script>