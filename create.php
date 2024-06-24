<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <title>Add New Book</title>
    <style>
        body {
            background-color: #E4E4E4;
        }
        .btn-back {
            background-color: #534741;
            color: #fff;
        }
        .btn-back:hover {
            background-color: #C7B299;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #534741;
            border: none;
        }
        .btn-primary:hover {
            background-color: #C7B299;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        header {
            text-align: center;
        }
        header h1 {
            color: #534741;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <header class="d-flex justify-content-between align-items-center my-4">
            <div>
                <a href="dashboard.php" class="btn btn-secondary btn-back"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <h1>Add New Book</h1>
            <div></div>
        </header>
        <div class="form-container">
            <form action="process.php" method="post" enctype="multipart/form-data">
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="title" placeholder="Book Title">
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="author" placeholder="Author Name">
                </div>
                <div class="form-element my-4">
                    <select name="type" id="" class="form-control">
                        <option value="">Select Book Type</option>
                        <option value="Finance">Finance</option>
                        <option value="Self-growth">Self-growth</option>
                        <option value="Philosophy">Philosophy</option>
                        <option value="Jazz">Jazz</option>
                    </select>
                </div>
                <div class="form-element my-4">
                    <textarea name="description" id="" class="form-control" placeholder="Book Description"></textarea>
                </div>
                <div class="form-element my-4">
                    <input type="number" class="form-control" name="price" placeholder="Price (XAF)">
                </div>
                <input class="form-control mt-4" type="file" name="image" id="">
                <div class="form-element my-4">
                    <input type="submit" name="create" value="Add Book" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
