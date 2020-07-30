<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <title>DnD 5e GraphQL</title>
</head>
<body class="text-center text-md-left">
    <nav id="navbar" class="navbar sticky-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="/">DnD5e-GraphQL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/docs">Documentation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://github.com/TarikAmine/5e-srd-graphql">Github</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/graphiql">Try Live</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="hero" class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-auto text-center">
                    <img src="/img/logo.png" alt="Logo" id="logo" class="img-fluid"/>
                </div>
                <div class="col">
                    <h1 class="display-4 mt-2">DnD 5e GraphQL API</h1>
                    <p class="lead mb-0">Query D&D 5th edition SRD database with GraphQL</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-column">
                <div class="card flex-grow-1 mb-4">
                    <div class="card-body d-flex align-items-center">
                        <p class="card-text">
                            <strong>Welcome!</strong> this is a GraphQL schema built using Lumen querying a MongoDB database for all your D&D 5th edition data needs.
                                Data is seeded from this awesome project 
                            <a href="https://github.com/bagelbits/5e-database" class="text-dark" target="_blank">
                                <strong>bagelbits</strong>/<strong>5e-database</strong> 
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <a href="/graphiql" class="btn btn-primary btn-lg btn-block mb-4">
                    <strong>Try it Live</strong>
                </a>
                <a href="https://github.com/bagelbits/5e-database" class="btn btn-secondary btn-block mb-4">
                    <strong>Github Repo</strong>
                </a>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">

            </div>
            <div class="col">

            </div>
            <div class="col">

            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
