<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student dashboard</title>

    <!-- font link  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400&family=Merriweather&family=Ms+Madi&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <style>
        .dlabel {
            color: black;
            padding: 10px 10px;
            text-align: start;
            font-size: 40px;
            border-bottom: solid blue 2px;
        }

        .thead-main {
            text-align: center;
            height: 100%;
            width: 100%;
            margin-left: 175px;
        }

        /* css for card  */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: start;
            gap: 1rem;
            padding: 10px 10px;
        }

        .card {
            width: 100%;
            max-width: 350px;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            background-color: #4572ba;
            color: #fff;
        }


        .card:hover {
            background-color: #3e66a8;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-align: start;
        }

        .card-content {
            display: flex;
            justify-content: space-between;
        }

        .card-info {
            display: flex;
            flex-direction: column;
        }

        .card-label {
            font-size: 0.875rem;
        }

        .card-value {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include('sidebar.php'); ?>

        <div class="thead-main">
            <div class="dlabel">
                Dashboard
            </div>
            <div class="card-container">
                <div class="card">
                    <h2 class="card-title">Student</h2>
                    <div class="card-content">
                        <div class="card-info">
                            <div class="card-label">Total</div>
                            <div class="card-value">10</div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2 class="card-title">Course Enrolled</h2>
                    <div class="card-content">
                        <div class="card-info">
                            <div class="card-label">Total</div>
                            <div class="card-value">50</div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h2 class="card-title">Registered</h2>
                    <div class="card-content">
                        <div class="card-info">
                            <div class="card-label">Total</div>
                            <div class="card-value">5</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>