        </div>
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>	
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/modales.js"></script>
        <?php
            $pag = $_SERVER['REQUEST_URI'];
            $pag = str_replace("#", "", $pag);
            switch($pag){
                case "/actividades/index.php/cropimage";
                    echo '<script src="'.base_url().'assets/js/jquery-pack.js"></script>';
                    echo '<script src="'.base_url().'assets/js/jquery.imgareaselect.min.js"></script>';
                    echo '<script src="'.base_url().'assets/js/cropimage.js"></script>';
                    break;
                default:
                    echo '<script src="'.base_url().'assets/js/actividades.js"></script>';
                break;
            }
        ?>
    </body>
</html>