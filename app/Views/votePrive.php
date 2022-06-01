<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Votre Vote</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Question</th>
                                    <th>Choix</th>
                                    <th>Etat</th>
                                    <th>Gestion</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($question as $ques) : ?>
                                    <tr>
                                        <td><?php echo $ques['vote_question']; ?></td>
                                        <td><?php foreach ($choix as $cho) {
                                                echo $cho['cho_nom'];
                                                echo "<br>";
                                            } ?></td>
                                        <td><?php if ($ques['vote_etat'] == "O") echo "Ouvert";
                                            else echo "Fermé"; ?></td>
                                        <td>
                                            <div class="row">
                                            <a href="<?php echo base_url() . "/home/changerEtat/" . $ques["vote_id"] ?>"><button type="button" class="btn btn-primary">Ouvrir/Fermer</button></a>
                                                <button type="button" class="btn btn-success">Resultats</button>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="col text-center">
                        <a href="<?php echo base_url(); ?>" style="text-decoration:none"><button type="button" class="btn btn-Danger btn-user w-50"> RETOUR</button></a>
                        </div>
                                   
                    </div>
                </div>
            </div>

        </div>


    </div>




    </div>


    </div>