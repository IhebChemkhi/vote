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
                                    <form class="user" action="<?php echo base_url();?>/home/voteCreer" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="question" id="exampleInputEmail" placeholder="La question" value="<?= set_value('question') ?>">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block"> SUIVANT</button>
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