<?php
    include("config/config.php");
    class TaskManager extends Connection{

        public function add_task($allData){
        
            $task__title = $allData['task__title'];

            $imageName = $_FILES['task__image']['name'];
            $tmpImageName = $_FILES['task__image']['tmp_name'];
            
            $task__deadline = $allData['task__deadline'];
            
            $sql = "INSERT INTO `tasks`(`task__title`, `task__image`, `task__deadline`) VALUES ('$task__title','$imageName','$task__deadline')";
            $result = $this->con->query($sql);
            if($result){
                move_uploaded_file($tmpImageName, "upload/".$imageName);
            }

        }

        public function show(){
            return $result = $this->con->query("SELECT * FROM `tasks`");
        }
    }

?>