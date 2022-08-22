<style type="text/css">
.sty-radio {
    position: inherit;
    opacity: 1;
    pointer-events: auto;
}
</style>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="section-title"><span class="theme-secondary-color">FORM</span> LOGIN</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s2"></div>
    <div class="col s8">
        <div class="comment-wrap">
            <div class="c-form">
                <?php if ($this->session->flashdata('error')): ?>
                <div class="section testimonial">
                    <div class="testimonial-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <p align="center"><?php echo $this->session->flashdata('error'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <?php endif;?>
                <form action="<?php echo base_url() ?>login/in" enctype="multipart/form-data" method="POST">

                    <label for="u_email">Email :</label>
                    <div class="input-field">
                        <input id="u_email" name="u_email" type="email" class="validate" placeholder="Email">
                    </div>

                    <label for="u_pass">Password :</label>
                    <div class="input-field">
                        <input id="u_pass" name="u_pass" type="password" class="validate" required
                            placeholder="Password">
                    </div>

                    <label for="u_pass">Login sebagai :</label>
                    <div class="input-field">
                        <input type="radio" name="u_jenis" style="position: inherit;opacity: 1;pointer-events: auto;"
                            value="U" checked> Umum
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" name="u_jenis" style="position: inherit;opacity: 1;pointer-events: auto;"
                            value="D"> Dokter
                    </div>
                    <button class="btn">Login</button>
                    <a href="<?php echo base_url() ?>login/recovery" class="btn"> Lupa</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col s2"></div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>