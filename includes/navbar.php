    <?php
        if(isset($_GET['chcke'])){
            ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-info">
                <div class="container">
                    <a class="navbar-brand" href="../index.php">ONGEZA ONLINE TEST</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../customer/customer.php?chcke=1">Add Customer</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php
        }else{?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-info">
                <div class="container">
                    <a class="navbar-brand" href="index.php">ONGEZA ONLINE TEST</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="customer/customer.php?chcke=1">Add Customer</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php
        }
    ?>
