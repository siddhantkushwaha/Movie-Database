<?php 
    require_once('../functions/functions.php');
    $r = $functions->show_movies();

    if(@$_POST["ratingList"])
    {
        echo $_POST["ratingList"];
        $r = $functions->sortMovieAccordingToRatings($_POST["ratingList"]);
    }
    else{
        echo "FALSE";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DBMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .navbar {
            height: 60px;
            background: rgba(0, 0, 0, .4) !important;
        }
        .body-card {
            padding: 5px;
        }
        .card {
            display: grid;
            grid-template-columns: 30% 70%;
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-fixed-top">
        <a class="navbar-brand" href="/">Movie Base</a>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" style="width: 500px;" type="search" placeholder="Search By" aria-label="Search By">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>

      <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          genres
                        </a>
                        <div class="dropdown-menu genres" aria-labelledby="navbarDropdown">
                          
                        </div>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Ratings
                        </a>
                        <form action="" method="POST" name="ratingSortForm"><div class="dropdown-menu ratings-dyn" aria-labelledby="navbarDropdown" id="ratingsDropdown">
                          
                        </div></form>
                      </li>
                      <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                            </li>
                            <li class="nav-item mr-2">
                            <button class="btn btn-success">Director</button>
                            </li>
                            <li class="nav-item mr-2">
                            <button class="btn btn-success">Actor</button>
                            </li>
                            <li class="nav-item mr-2">
                            <button class="btn btn-success">Movie</button>
                            </li>
                            <li class="nav-item mr-2">
                            <button class="btn btn-success">Extra</button>
                            </li>

                    </ul>
      </nav>

      <div class="content">

        <div class="content-inner">
            <?php if($r) { ?>
                <?php while($data = $r->fetch_assoc()) { ?>
                    <div class="card my-3" style="width: 50rem;">
                    <img class="card-img-top" src="<?php echo $data["cover_link"] ?>" alt="Card image cap">
                    <div class="body-card">
                        <h5 class="card-title"><?php echo $data["movie_name"] ?></h5>
                        <p class="card-text" style="text-align:justify;";><?php echo $data["synopsis"] ?></p>
                        <a href="<?php echo $data["torrent_link"] ?>" class="btn btn-primary">Download Torrent</a>
                        <a href="#" class="btn btn-success" disabled>Rating - <?php echo $data["rating"] ?></a>
                        <!-- <a href="#" class="btn btn-warning" disabled>Gross - $<?php echo $data["gross"] ?> </a> -->
                        <a href="#" class="btn btn-warning" disabled>Year - <?php echo $data["year"] ?></a>
                    </div>
                    </div>
                <?php } } else {  ?> No Movies <?php } ?>
        </div>

      </div>

      

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    function ratingFormSubmit()
    {
        document.ratingSortForm.submit();
    }
const ratings = document.querySelector('.ratings-dyn')
/*const rangeRate = '<select name="ratingList">';
rangeRate += Array.from({ length: 10 }, (_, i) => Math.abs(10-i)).map(i => `<option class="dropdown-item" href="#" onClick="ratingFormSubmit()">${i}</option>`).join('')
rangeRate += '</select>';*/

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