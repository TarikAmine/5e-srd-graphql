<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/graphiql/0.13.0/graphiql.min.css" />
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
                    <a class="nav-link" href="https://github.com/TarikAmine/5e-srd-graphql" target="_blank">Github</a>
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
                <div class="col-12 col-md-auto text-center my-auto">
                    <img src="/img/logo.png" alt="Logo" id="logo" class="img-fluid"/>
                </div>
                <div class="col my-auto">
                    <h1 class="display-4 mt-2">DnD 5e GraphQL API</h1>
                    <p class="lead mb-0">
                        Query D&D 5th edition SRD database with GraphQL
                    </p>
                </div>
                <div class="col-12 col-lg-5 text-center px-0 pt-5 px-lg-3 pt-lg-0 my-auto">
                    <img src="/img/example.png" alt="GraphQL Example" class="img-fluid img-thumbnail"/>
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
        <div class="row">
            <div class="col">
                <h3 class="border-bottom font-weight-light text-muted">Examples :</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="GraphqlCodeBlock"><pre><span class="punctuation">{</span></pre><pre><span class="ws">  </span><span class="property">SpellList</span><span class="ws"> </span><span class="punctuation">{</span></pre><pre><span class="ws">    </span><span class="property">name</span></pre><pre><span class="ws">    </span><span class="property">school</span><span class="ws"> </span><span class="punctuation">{</span></pre><pre><span class="ws">      </span><span class="property">name</span></pre><pre><span class="ws">    </span><span class="punctuation">}</span></pre><pre><span class="ws">    </span><span class="property">classes</span><span class="ws"> </span><span class="punctuation">{</span></pre><pre><span class="ws">      </span><span class="property">name</span></pre><pre><span class="ws">    </span><span class="punctuation">}</span></pre><pre><span class="ws">  </span><span class="punctuation">}</span></pre><pre><span class="punctuation">}</span></pre></div>
                    </div>
                    <a target="_blank" class="card-footer card-link text-dark py-1 text-center" href="/graphiql?query=%7B%0A%20%20SpellList%20%7B%0A%20%20%20%20name%0A%20%20%20%20school%20%7B%0A%20%20%20%20%20%20name%0A%20%20%20%20%7D%0A%20%20%20%20classes%20%7B%0A%20%20%20%20%20%20name%0A%20%20%20%20%7D%0A%20%20%7D%0A%7D%0A">
                        Try it
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="GraphqlCodeBlock"><pre><span class="punctuation">{</span></pre><pre><span class="ws">  </span><span class="property">Skill</span><span class="punctuation">(</span><span class="attribute">index</span><span class="punctuation">:</span><span class="ws"> </span><span class="string">"stealth"</span><span class="punctuation">)</span><span class="ws"> </span><span class="punctuation">{</span></pre><pre><span class="ws">    </span><span class="property">index</span></pre><pre><span class="ws">    </span><span class="property">name</span></pre><pre><span class="ws">    </span><span class="property">ability_score</span><span class="ws"> </span><span class="punctuation">{</span></pre><pre><span class="ws">      </span><span class="property">name</span></pre><pre><span class="ws">      </span><span class="property">full_name</span></pre><pre><span class="ws">    </span><span class="punctuation">}</span></pre><pre><span class="ws">  </span><span class="punctuation">}</span></pre><pre><span class="punctuation">}</span></pre></div>
                    </div>
                    <a target="_blank" class="card-footer card-link text-dark py-1 text-center" href='/graphiql?query=%7B%0A%20%20Skill(index%3A%20"stealth")%20%7B%0A%20%20%20%20index%0A%20%20%20%20name%0A%20%20%20%20ability_score%20%7B%0A%20%20%20%20%20%20name%0A%20%20%20%20%20%20full_name%0A%20%20%20%20%7D%0A%20%20%7D%0A%7D%0A'>
                        Try it
                    </a>
                </div>
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
