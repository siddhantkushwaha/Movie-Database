<?php require_once('../functions/functions.php');  ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
     .navbar {
            height: 60px;
            background: rgba(0, 0, 0, .4) !important;
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
    a:hover {
            text-decoration: none;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-fixed-top">

        <a class="navbar-brand" href="/">Movie Base</a>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100%;display: grid !important; grid-template-columns: 75% 25%;padding-right:7%;">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" style="width: 500px;" type="search" placeholder="Search By" aria-label="Search By">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="col-sm-10">
              <ul class="navbar-nav">
                <li class="nav-item mr-1">
                <a href="/directors.php" style="color:white;padding:5px;"><button class="btn btn-success">Directors</button></a>
                </li>
                <li class="nav-item mr-1">
                <a href="/actors.php" style="color:white;padding:5px;"><button class="btn btn-success">Actors</button></a>
                </li>
                <li class="nav-item mr-1">
                  <a href="/index.php" style="color:white;padding:5px;"><button class="btn btn-success">Movies</button></a>
                </li>
                <li class="nav-item mr-1">
                  <a href="/insert_movie.php" style="color:white;padding:5px;"><button class="btn btn-success">Add Movies</button></a>
                </li>
              </ul>
        </div>
    </nav>

      <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
                  <div class="collapse navbar-collapse" style="display: grid !important; grid-template-areas: '. list .'; grid-gap: 30%;" id="navbarSupportedContent">
                    <ul class="navbar-nav" style="grid-area: list;">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          genres
                        </a>
                        <form action="" method="POST" name="genreSortForm">
                          <div class="dropdown-menu genres" aria-labelledby="navbarDropdown" id="genreDropdown">
                            
                          </div>
                        </form>  
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Ratings
                        </a>
                        <form action="" method="POST" name="ratingSortForm">
                          <div class="dropdown-menu " aria-labelledby="navbarDropdown" id="ratingsDropdown">
                            
                          </div>
                        </form>
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
                    </ul>
      </nav>

<script>
    function ratingFormSubmit()
    {
        document.ratingSortForm.submit();
    }
    function genreFormSubmit(){
      document.genreSortForm.submit();
    }

var rangeRate = '<select style="background: #fff; border: none; width: 100%;" name="ratingList" onChange="ratingFormSubmit()">';
for(i = 1; i<=10; i++)
    rangeRate+='<option value="'+i+'" class="dropdown-item">'+i+'</option>';
rangeRate += '</select>';
document.getElementById('ratingsDropdown').innerHTML = rangeRate;

const gens = ['Drama','Sci-Fi','Action','Family','Documentary','Music','War','Romance','Animation','Western','Thriller','Musical','Sport','Comedy','News','Adventure','Crime','Fantasy','Horror','Mystery','History','Film-Noir','Biography']

var rangeRate2 = '<select style="background: #fff; border: none; width: 100%;" name="genreList" onChange="ratingFormSubmit()">';
for(i = 0; i<=23; i++)
    rangeRate2+='<option value="'+gens[i]+'" class="dropdown-item">'+gens[i]+'</option>';
rangeRate2 += '</select>';
document.getElementById('genreDropdown').innerHTML = rangeRate2;

document.querySelector('.pag').innerHTML = `<li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>` + `<li class="page-item active"><a class="page-link" href="#">1</a></li>` + Array.from({ length: 19 }, (_, i) => i+2).map(i => `<li class="page-item"><a class="page-link" href="${i}">${i}</a></li>`).join('') + `<li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>`

</script>
