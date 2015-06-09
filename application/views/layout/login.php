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
						<b><?= $this->lang->line('proj_login_form_title'); ?></b>
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
								<form action="<?= site_url('welcome'); ?>" method="POST" name="form_login" id="form_login" role="form">
									<div class="form-group">
										<label class="control-label" for="email"><?= $this->lang->line('proj_email'); ?></label>
										<input class="form-control" name="email" required id="email" type="email">
									</div>
									<div class="form-group">
										<label class="control-label" for="senha"><?= $this->lang->line('proj_pass'); ?></label>
										<input class="form-control" name="senha" required id="senha" type="password">
									</div>
									<button type="submit" class="btn btn-lg btn-block btn-primary"><i class="glyphicon glyphicon-off"></i> <?= $this->lang->line('proj_login'); ?></button>
							  </form>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </body>

</html>