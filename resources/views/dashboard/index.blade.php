<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            transition: all 0.3s ease;

        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            overflow-x: hidden;
        }

        .dashboard {
            padding: 20px;
            margin-left: 250px;
            /* Adjust for the menu panel */
            transition: margin-left 0.3s ease;
        }

        .menu-panel {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #343a40;
            color: white;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 1000;
            transform: translateX(0);
        }

        .menu-panel.open {}

        .menu-panel ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-panel ul li {
            padding: 15px 20px;
            border-bottom: 1px solid #495057;
            display: flex;
            align-items: center;
        }

        .menu-panel ul li i {
            margin-right: 10px;
        }

        .user-card .profile-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 50em;

        }

        .profile-card img {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .profile-card h5,
        .profile-card p {
            text-align: justify;
            padding: 10px;
        }

        .username {
            color: red;
        }

        .username:after {
            content: "!";
            color: #007bff;
        }
        .cards{
            margin-top: 20px;
            width: 60em;
        }
    </style>
</head>

<body>
    <div class="menu-panel">
        <ul>
            <li><i class="fas fa-home"></i> Home</li>
            <li><i class="fas fa-user"></i> Profile</li>
            <li><i class="fas fa-cog"></i> Settings</li>
            <li><i class="fas fa-sign-out-alt"></i> Logout</li>
        </ul>
    </div>
    <div class="dashboard container">
        <div class="row mb-4">
            <div class="col-md-4 user-card">
                <div class="card profile-card">
                    <img src="https://img.freepik.com/free-vector/blue-circle-with-white-user_78370-4707.jpg"
                        alt="User Profile">
                    <h5>Welcome Back <span class="username">{{ $user->username }}</span></h5>
                    <p>IP address: <span id="ip-address">Loading...</span></p>
                    <p>Computer Name: <span id="computer-name">Loading...</span></p>
                    <p>Browser: <span id="browser-name">{{ $_SERVER['HTTP_USER_AGENT'] }}</span></p>


                </div>
            </div>
        </div>
        <div class="row cards">
            <div class="col-md-4">
                <div class="card p-3">
                    <h5 class="card-title">Card 1</h5>
                    <p class="card-text">This is some static data for card 1.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5 class="card-title">Card 2</h5>
                    <p class="card-text">This is some static data for card 2.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5 class="card-title">Card 3</h5>
                    <p class="card-text">This is some static data for card 3.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fetch IP address using an external API
        fetch('https://api.ipify.org?format=json')
            .then(response => response.json())
            .then(data => {
                document.getElementById('ip-address').textContent = data.ip;
            })
            .catch(error => {
                console.error('Error fetching IP address:', error);
                document.getElementById('ip-address').textContent = 'Unable to fetch IP';
            });

        // Attempt to get the computer name (limited in browsers)
        document.getElementById('computer-name').textContent = 'Unavailable in browser';
    </script>
</body>

</html>
