<?php 
    require_once('navbar.php');
    $r = $functions->directors_actors();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=s, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Actors</title>
        <style>
             .navbar {
                height: 60px;
                background: rgba(0, 0, 0, .4) !important;
            }
            .body-card {
                padding: 5px;
            }
            .my-card {
                display: grid;
                grid-template-rows: 320px 130px;
            }
	.inner-whole {
		display: grid;
		grid-gap: 80px;
	}
        .navbar-brand {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 5px;
            text-align: center;
            margin: auto;
            font-size: 25px;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
        }
        body {
            background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
        }
        .content-inner {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(4, 14rem);
            grid-gap: 28px;
            grid-row-gap: 100px;
        }
	.director-content {
		display: flex;
		justify-content: center;
		align-items: center;	
	}    </style>
    </head>
    <body>
        <div class="content">
            
            <div class="inner-whole">

                <div style="display: flex; justify-content: center; align-items: center;">
                        <div class="director-content" style="width: 280px">
                            <?php
                            
                            $actor_id = 0;
                            $director_id = 0;

                            while($data = $r->fetch_assoc())
                            {
                                if($actor_id != $data["aid"])
                                {
                                    $director_id = 0;
                                    $actor_id = $data["aid"];
                                    $actor_details = $functions->get_actor_details($actor_id);
                                    echo $actor_details["actor_name"];
                                    echo "\n";
                                    if($director_id != $data["did"])
                                    {
                                        $director_id = $data["did"];
                                        $dir_details = $functions->get_dir_details($director_id);
                                        echo $dir_details["dir_name"];
                                    }
                                }
                                else
                                {
                                    if($data["did"] != $director_id)
                                    {
                                        $director_id = $data["did"];
                                        $dir_details = $functions->get_dir_details($director_id);
                                        echo $dir_details["dir_name"];
                                    }
                                }
                            }
                            
                            ?>
                        </div>
                </div> 

                <div class="content-inner">
                    <?php if($r_actors) { ?>
                        <?php while($data = $r_actors->fetch_assoc()) { ?>
                            <div class="my-card" style="width: 100%;">
                                <img style="width: 100%; height: 100%;"  src="<?php echo $data["img_url"] ?>" alt="Card image cap">
                                    <div style="background: #fff; height: 200px;">
                                        <h4 class="card-title text-center"><?php echo $data["actor_name"] ?></h4>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Birth Date: <?php echo $data["birth_date"] ?></li>
                                            <li class="list-group-item">Birth Place: <?php echo $data["birth_place"] ?></li>
                                        </ul>
                                    </div>
                            </div>
                    <?php } } ?>
                </div>
                 
            </div>
        </div>
    </body>
</html>