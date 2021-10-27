<?php include "database/data.php" ?>
<?php
    if(isset($_GET['diadiem']))
    {
        $iddiadiem = $_GET['diadiem'];
    }
    else $iddiadiem = null;
?>

   <body>
        <?php include "include/preloader.php" ?>
    <header>
        <?php include "include/header.php" ?>
    </header>

    <main>


        <div class="favourite-place place-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="">
                        <div class="section-tittle text-center">

                            <?php
                                $sql = "SELECT * FROM diadiemdulich WHERE IDDiaDiemDuLich = $iddiadiem";
                                $result = mysqli_query($conn,$sql);
                                $row = mysqli_fetch_array($result);
                            ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Favourite Places End -->
    </main>


    <?php include "include/footer.php" ?>
        
    </body>
</html>