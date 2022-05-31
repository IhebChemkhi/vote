<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">VOTEZ!</h6>
                </div>
                <div class="card-body">
                    <h4><?php echo $question['vote_question']; ?></h4>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Choix</th>
                                    <th>à rejeter</th>
                                    <th>trés mauvais</th>
                                    <th>mauvais</th>
                                    <th>Moyen</th>
                                    <th>bon</th>
                                    <th>trés bon</th>
                                    <th>parfait</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($choix as $cho) : ?>
                                    <tr>
                                        <td> <?php echo $cho['cho_nom']; ?> </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios<?php echo $cho['cho_id'] ?>" value="<?php echo $cho['cho_nom']; ?>">
                                                <label class="form-check-label" for="exampleRadios2">
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios<?php echo $cho['cho_id'] ?>" value="<?php echo $cho['cho_nom']; ?>">
                                                <label class="form-check-label" for="exampleRadios2">
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios<?php echo $cho['cho_id'] ?>" value="<?php echo $cho['cho_nom']; ?>">
                                                <label class="form-check-label" for="exampleRadios2">
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios<?php echo $cho['cho_id'] ?>" value="<?php echo $cho['cho_nom']; ?>">
                                                <label class="form-check-label" for="exampleRadios2">
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios<?php echo $cho['cho_id'] ?>" value="<?php echo $cho['cho_nom']; ?>">
                                                <label class="form-check-label" for="exampleRadios2">
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios<?php echo $cho['cho_id'] ?>" value="<?php echo $cho['cho_nom']; ?>">
                                                <label class="form-check-label" for="exampleRadios2">
                                                </label>
                                            </div>
                                        </td><td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="exampleRadios<?php echo $cho['cho_id'] ?>" value="<?php echo $cho['cho_nom']; ?>">
                                                <label class="form-check-label" for="exampleRadios2">
                                                </label>
                                            </div>
                                        </td>
                                        

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
</body>