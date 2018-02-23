<?php 
    require_once('navbar.php');
    $r = $functions->show_Directors();

    if(@$_POST["ratingList"])
    {
        echo $_POST["ratingList"];
        $r = $functions->sortMovieAccordingToRatings($_POST["ratingList"]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Directors</title>
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
    </style>
</head>
<body>
      <div class="content">
            <div class="content-inner">
                <?php if($r) { ?>
                    <?php while($data = $r->fetch_assoc()) { ?>
                        <div class="my-card" style="width: 100%;">
                                <img style="width: 100%; height: 100%;"  src="<?php echo $data["img_url"] ?>" alt="Card image cap">
                                <div style="background: #fff; height: 200px;">
                                    <h4 class="card-title text-center"><?php echo $data["dir_name"] ?></h4>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Birth Date: <?php echo $data["birth_date"] ?></li>
                                        <li class="list-group-item">Birth Place: <?php echo $data["birth_place"] ?></li>
                                    </ul>
                                </div>
                        </div>
                    <?php } } else {  ?> No Movies <?php } ?>
            </div>
      </div>

<script>
    function ratingFormSubmit()
    {
        document.ratingSortForm.submit();
    }
const ratings = document.querySelector('.ratings-dyn')

var rangeRate = '<select name="ratingList" onChange="ratingFormSubmit()">';
for(i = 1; i<=10; i++)
    rangeRate+='<option value="'+i+'" class="dropdown-item">'+i+'</option>';
rangeRate += '</select>';

document.getElementById('ratingsDropdown').innerHTML = rangeRate;
const gens = ['love', 'comedy', 'action', 'adventure', 'horror', 'thriller', 'crime'].map(i => `<a class="dropdown-item" href="#">${i}</a>`).join('')
const $gens = document.querySelector('.genres')
$gens.innerHTML = gens
</script>
</body>
</html>