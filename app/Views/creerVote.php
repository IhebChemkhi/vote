<body style="background-color: #A78881">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-md-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Quelle est la question?</h1>
                                    </div>
                                    <?php if (session()->getFlashdata('success') !== NULL) : ?>
										<div class="alert alert-success" style="text-align: center;" role="alert">
											<?php echo session()->getFlashdata('success'); ?>
										</div>
									<?php endif; ?>
                                    <form class="user" action="<?php echo base_url(); ?>/home/voteCreer" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="question" placeholder="La question" value="<?= set_value('question') ?>">
                                            <div id="choix">
                                                <input type="text" class="form-control form-control-user my-2" name="choix1" placeholder="Choix" value="">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-user btn-block" onclick="addFields()">Ajouter choix</button>
                                        <button type="submit" class="btn btn-success btn-user btn-block"> CREER</button>
                                    </form>
                                    <?php if (isset($validation)) : ?>
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                <?= $validation->listErrors() ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script type='text/javascript'>
    function addFields() {
        // Get the element where the inputs will be added to
        var container = document.getElementById("choix");
        // Remove every children it had before
        // while (container.hasChildNodes()) {
        //     container.removeChild(container.lastChild);
        // }
        var input = document.createElement("input");
        input.type = "text";
        input.name = "choix" + (container.childElementCount + 1);
        input.className = "form-control form-control-user my-2";
        input.placeholder = "Choix";
        container.appendChild(input);
    }
</script>