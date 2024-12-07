<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My Website</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">To Anothe Life</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true"></a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
            </nav>
        </header>

        <div class="container"></div>
        <?php include("dbcon.php"); ?>

            <h2>All Students</h2>
            <div class="box1">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button> 
            </div>
            

            </button>
            <table class="table table-hover table-border table-striped">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Sub Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal Post</th>
                        <th>Deadline</th>
                        <th>Deskripsi</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM `tugas_pendahuluan`";

                        $result = mysqli_query($connected, $query);
                    
                        if (!$result) {
                            die("Query Failed".mysqli_error($connected));
                        } else {
                            print_r($result);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><?php echo $row['subjudul']; ?></td>
                                        <td><?php echo $row['kategori']; ?></td>
                                        <td><?php echo $row['tanggalpost']; ?></td>
                                        <td><?php echo $row['deadline']; ?></td>
                                        <td><?php echo $row['deskripsi']; ?></td>
                                        <td><a href="update_page_1.php?id= <?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                                        <td><a href="delete_page.php?id= <?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                                    </tr>                                    
                                    

                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            <?php
                if (isset(($_GET['message']))) {
                    echo "<h6>" .$_GET['message']."</h6>";
                }

            ?>

            <?php
                if (isset(($_GET['insert_msg']))) {
                    echo "<h5>" .$_GET['insert_msg']."</h5>";
                }

            ?>

            <?php
                if (isset(($_GET['delete_msg']))) {
                    echo "<h5>" .$_GET['delete_msg']."</h5>";
                }

            ?>

            <!-- Modal -->
            <form action="insert_data.php" method="post"> 
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add TP</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="subjudul">Sub judul</label>
                                <input type="text" name="subjudul" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <input type="text" name="kategori" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tanggalpost">Tanggal Post</label>
                                <input type="text" name="tanggalpost" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="text" name="deadline" class="form-control">
                            </div>  
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control">
                            </div>                                                                                                          
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="add_tp" value="Add">
                    </div>
                    </div>
                </div>
                </div>
            </form>  
        </div>

        <footer>
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </>
            <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>            