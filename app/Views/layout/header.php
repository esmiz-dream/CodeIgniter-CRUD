<style>
    .dropdown-item:hover{
        background-color: rgba(221, 72, 20, .7);
                color: rgba(255, 255, 255, .8);
    }
</style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
            <h5 class="pt-1">
                <?php
                if (isset($_SESSION['user'])) {
                    echo $_SESSION['user']['name'];
                }

                ?>
            </h5>
        </a>
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
            </ul>
            <!-- Left links -->

            <!-- Right elements -->
            <div class="d-flex align-items-center justify-content-start">
                <!-- Icon -->


                <!-- Notifications -->

                <!-- Avatar -->
                <?php
                if (isset($_SESSION['user'])) {
                    echo '<a class="dropdown-item" href="/logout">logout</a>';
                }
                ?>
                


            </div>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->