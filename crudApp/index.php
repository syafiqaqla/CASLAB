<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>

            <h2>All Students</h2>
            <div class="box1">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student</button> 
            </div>
            

            </button>
            <table class="table table-hover table-border table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM `tugas_pendahuluan`";

                        $result = mysqli_query($connection, $query);
                    
                        if (!$result) {
                            die("Query Failed".mysqli_error($connection));
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
                                <label for="subjudul">Sub Judul</label>
                                <input type="text" name="subjudul" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="kategori">kategori</label>
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

<?php include("footer.php"); ?>            