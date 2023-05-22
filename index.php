<?php
    include("classes/TaskManager.php");
    $t1 = new TaskManager();

    if(isset($_POST['submit'])){
        $t1->add_task($_POST);
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12 shadow p-5 rounded">
                <div class="text-center text-primary">
                    <h2 class="display-4 fw-semibold">Task Management System</h2>
                    <p class="lead">Manage Tasks & Do Multitasking</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <!-- All Task -->
                        <div class="all__tasks mb-6">
                            <h2 class="text-primary display-6">All Tasks</h2>
                            <table class="table table-striped">
                                <tr>
                                    <th>SN.</th>
                                    <th>Task</th>
                                    <th>Image</th>
                                    <th>Deadline</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                
                                    $data = $t1->show();
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($data)){ ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['task__title']; ?></td>
                                    <td>
                                        <img src="./upload/<?php echo $row['task__image']; ?>" alt="" width="100px" height="100px">
                                    </td>
                                    <td><?php echo date("d-m-Y", strtotime($row['task__deadline'])); ?></td>
                                    <td><a href="" class="btn btn-outline-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                                
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="add__task">
                            <h2 class="text-primary display-6">Add Task</h2>
                            <form action="" method="POST" enctype="multipart/form-data" class="form">
                                <div class="form-group task__title mb-3">
                                    <label for="task__title">Task Title</label>
                                    <input type="text" name="task__title" id="task__title" placeholder="Add Task Title" class="form-control" />
                                </div>
                                <div class="form-group task__title mb-3">
                                    <label for="task__image">Task Image</label>
                                    <input type="file" name="task__image" id="task__image"class="form-control" />
                                </div>
                                <div class="form-group task__deadline mb-3">
                                    <label for="task__deadline">Task Deadline</label>
                                    <input type="date" name="task__deadline" id="task__deadline" class="form-control"/>
                                </div>
                                <div class="task__title">
                                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-outline-primary"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Add Task -->
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>