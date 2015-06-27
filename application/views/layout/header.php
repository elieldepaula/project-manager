<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="<?= base_url('assets'); ?>/js/jquery.js"></script>
        <script type="text/javascript" src="<?= base_url('assets'); ?>/js/bootstrap.js"></script>
        <link href="<?= base_url('assets'); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets'); ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
        <title><?= $this->lang->line('proj_site_title'); ?></title>
        <style type="text/css">
            <!--
            .style1 {
                color: #FF0000;
                font-weight: bold;
            }
            body {
                /*margin-top:10%;*/
                background-image:url(<?= base_url('assets'); ?>/img/bg.jpg);
                background-position: center;
            }
            -->
        </style>
        <script type="text/javascript">
            function apagar() {
                if (confirm('<?= $this->lang->line("proj_msg_confirm_delete"); ?>'))
                    return true;
                else
                    return false;
            }
        </script>
        <script src="<?= base_url(); ?>assets/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init(
                {
                    selector:'textarea#editor',
                    plugins: [
                        "advlist autolink lists link image charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    menubar: false,
                    toolbar: " bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
                }
            );
        </script>
    </head>

    <body>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?= anchor('', $this->lang->line('proj_brand'), array('class'=>'navbar-brand')); ?>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <?= anchor('', 'Dashboard'); ?>
                        </li>
                        <?php if($this->login->is_admin()){ ?>
                            <li>
                                <?= anchor('projetos', $this->lang->line('proj_projects')); ?>
                            </li>
                            <li>
                                <?= anchor('projetos/add', $this->lang->line('proj_new_project')); ?>
                            </li>
                        <?php } ?>
                        <li>
                            <?php
                            if($this->login->is_admin()){
                                echo anchor('usuarios', $this->lang->line('proj_users'));
                            } else {
                                echo anchor('usuarios/perfil', $this->lang->line('proj_profile'));
                            }
                            ?>
                        </li>
                        <li>
                            <?= anchor('welcome/logout', $this->lang->line('proj_logout')); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <?php
                
                $msg_sistema = $this->session->flashdata('msg');
                if ($msg_sistema) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger">
                                <button contenteditable="false" type="button" class="close" data-dismiss="alert">×</button>
                                <b><?= $msg_sistema; ?></b>
                            </div>
                        </div>
                    </div>
                    <?php 
                } 
                
                ?>
                <div class="row">
                    <div class="col-md-12">