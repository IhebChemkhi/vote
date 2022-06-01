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
                    <form class="user" action="<?php echo base_url(); ?>/home/votePublic/<?php echo $question['vote_id'] ?>" method="post">
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
                                                    <input class="form-check-input" type="radio" name="<?php echo $cho['cho_id'] ?>" value="rejeter">
                                                    <label class="form-check-label" for="Radio2">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="<?php echo $cho['cho_id'] ?>" value="tMauvais">
                                                    <label class="form-check-label" for="Radio2">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="<?php echo $cho['cho_id'] ?>" value="mauvais">
                                                    <label class="form-check-label" for="Radio2">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="<?php echo $cho['cho_id'] ?>" value="moyen">
                                                    <label class="form-check-label" for="Radio2">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="<?php echo $cho['cho_id'] ?>" value="bon">
                                                    <label class="form-check-label" for="Radio2">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="<?php echo $cho['cho_id'] ?>" value="tBon">
                                                    <label class="form-check-label" for="Radio2">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="<?php echo $cho['cho_id'] ?>" value="parfait">
                                                    <label class="form-check-label" for="Radio2">
                                                    </label>
                                                </div>
                                            </td>


                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col text-center">
                            <button type="submit" class="btn btn-success btn-user w-50"> VOTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>