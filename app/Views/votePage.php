<body style="background-color: #A78881">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-10 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Voulez-vous voter?</h1>
									</div>
									<form class="user">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Inserez le lien de vote">
										</div>
										<a href="#" class="btn btn-success btn-user btn-block">
											VOTER
										</a>
									</form>
									<form class="user">
										<p style="font-size: 15px;"> Voulez-vous créer un vote?</p>
										<a href="<?php echo base_url(); ?>/home/voteCreer " class="btn btn-primary btn-user btn-block">
											CREER
										</a>
									</form>
								</div>


							</div>
						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
</body>