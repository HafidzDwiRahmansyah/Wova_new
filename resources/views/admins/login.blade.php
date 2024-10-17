<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Login</title>
    <link rel="shortcut icon" href="/image/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <section class="conntent">
        <div class="container">
            <div class="jarak1"></div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card border-0 shadow rounded-2">
                        <div class="card-body">
                            <h4 class="text-center py-3">Login Page</h4>
                            <form action="/loginadmwv" method="post">
                                @csrf
                                <label class="form-label" for="name">Username</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="username..."><br>
                                <label class="form-label" for="password">Username</label>
                                <input class="form-control" type="password" name="password" id="password"
                                    placeholder="password..."><br>
                                <button type="submit" class="btn btn-primary mx-auto d-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>