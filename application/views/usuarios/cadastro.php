<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="<?= base_url('assets'); ?>/js/jquery.js"></script>
        <script type="text/javascript" src="<?= base_url('assets'); ?>/js/bootstrap.js"></script>
        <link href="<?= base_url('assets'); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets'); ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
		<title><?= $this->lang->line('proj_site_title'); ?></title>
		<style>
		@media (min-width: 200px){
				.container{
					max-width: 400px;
				}
			}
			body {
				margin-top:10%;
				background-image:url(<?= base_url('assets'); ?>/img/bg-login.jpg);
				background-position: center;
			}
		</style>
    </head>
    
    <body>
        <div class="section">
            <div class="container">
				<div class="panel panel-default">
					<div class="panel-heading">
						<b>Cadastro</b>
					</div>
					<div class="panel-body">
						<?php
		                
		                $msg_sistema = $this->session->flashdata('msg');
		                if ($msg_sistema) { ?>
		                    <div class="row">
		                        <div class="col-md-12">
		                            <div class="alert alert-dismissable alert-danger">
		                                <button contenteditable="false" type="button" class="close" data-dismiss="alert">×</button>
		                                <?= $msg_sistema; ?>
		                            </div>
		                        </div>
		                    </div>
		                    <?php 
		                } 
		                
		                ?>
						<div class="row">
							<div class="col-md-12">
								<form action="<?= site_url('cadastro'); ?>" method="post" name="form_login" id="form_login" role="form">
									<div class="form-group">
										<label class="control-label" for="nome"><?= $this->lang->line('proj_name'); ?></label>
										<input class="form-control" name="nome" required id="nome" type="text">
										<?=  form_error('nome', '<p style="color:#900;">', '</p>'); ?>
									</div>
									<div class="form-group">
										<label class="control-label" for="funcao"><?= $this->lang->line('proj_function'); ?></label>
										<input class="form-control" name="funcao" required id="funcao" type="text">
										<?=  form_error('funcao', '<p style="color:#900;">', '</p>'); ?>
									</div>
									<div class="form-group">
										<label class="control-label" for="email"><?= $this->lang->line('proj_email'); ?></label>
										<input class="form-control" name="email" required id="email" type="email">
										<?=  form_error('email', '<p style="color:#900;">', '</p>'); ?>
									</div>
									<div class="form-group">
										<label class="control-label" for="senha"><?= $this->lang->line('proj_pass'); ?></label>
										<input class="form-control" name="senha" required id="senha" type="password">
										<?=  form_error('senha', '<p style="color:#900;">', '</p>'); ?>
									</div>
									<button type="submit" class="btn btn-lg btn-block btn-primary">Enviar</button>
							  </form>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </body>

</html>