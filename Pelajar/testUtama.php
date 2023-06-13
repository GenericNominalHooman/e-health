<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            padding: 0% 10% 0% 10%;
        }

        .container {
            display: flex;
        }

        .left-container {
            flex: 1;
            float: left;
        }

        .right-container {
            flex: 1;
            float: right;
        }

        .logo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .logo img {
            max-width: 100px; /* Adjust the size of the logos as needed */
            max-height: 100px;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .navbar button {
            padding: 8px 12px;
            background-color: #666;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .navbar button:hover {
            background-color: #999;
        }

        .banner {
            text-align: center;
            padding: 20px;
        }

        .banner img {
            max-width: 100%;
        }

        .notice {
            background-color: red;
            color: black;
            padding: 10px;
            text-align: center;
        }

        .notice p {
            margin: 0;
        }

        .update-profile {
        background-color: #f2f2f2;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

        .update-profile .profile-icon {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #e6e6e6;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .update-profile .profile-icon img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .update-profile .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .update-profile .input-container label {
            width: 100px;
        }

        .update-profile .input-container input {
            flex: 1;
            padding: 5px;
        }

        .update-profile .update-button {
            padding: 10px 20px;
            background-color: #666;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-profile .update-button:hover {
            background-color: #999;
        }

        .status {
            background-color: #e6e6e6;
            padding: 20px;
        }

        .appointment {
            background-color: #cccccc;
            padding: 20px;
        }

        .logout-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
    <script>
        function displayImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('profile-img').src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>
<body>
    <div class="logo">
        <div class="left-logo">
            <img src="path_to_pic1.png" alt="Logo 1">
        </div>
        <div class="right-logo">
            <img src="path_to_pic2.png" alt="Logo 2">
        </div>
    </div>
    <div class="navbar">
        <button>Button 1</button>
        <button>Button 2</button>
        <button>Button 3</button>
        <button>Button 4</button>
    </div>
    <div class="banner">
        <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-vector%2Fflat-design-medical-clinic-sale-banner_31123804.htm&psig=AOvVaw3QEL4pz0d5JlDGsJmfTHr8&ust=1686632155369000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCPDYtcb4vP8CFQAAAAAdAAAAABAD" alt="Banner Image">
    </div>
    <div class="notice">
        <p>Please insert carefully after 9.00PM</p>
    </div>
    <div class="container">
        <div class="left-container">
            <div class="update-profile">
                <h2>Update Profile</h2>
                <div class="profile-icon">
                    <img id="profile-img" src="" alt="Profile Picture">
                </div>
                <input type="file" id="profile-image-input" onchange="displayImage(this)">
                <label for="profile-image-input" class="upload-button">Upload Picture</label>
                <div class="input-container">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="input-container">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>
                <button class="update-button">Update</button>
            </div>
        </div>
        <div class="right-container">
            <div class="status">
                <h2>Status</h2>
                <!-- Add your status content here -->
            </div>
            <div class="appointment">
                <h2>Appointment</h2>
                <!-- Add your appointment content here -->
            </div>
        </div>
    </div>
    <button class="logout-btn">Log Out</button>
</body>
</html>
