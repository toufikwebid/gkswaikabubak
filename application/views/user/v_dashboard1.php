<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #e0b0ff;
            /* Ungu muda */
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            transition: all 0.3s;
        }

        .sidebar.collapsed {
            width: 0;
        }

        .content {
            margin-left: 250px;
            transition: all 0.3s;
        }

        .content.collapsed {
            margin-left: 0;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            font-size: 24px;
            color: #fff;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        .sidebar-menu li a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar-menu li a:hover {
            background-color: #d19bff;
        }

        .toggle-btn {
            position: absolute;
            top: 10px;
            left: 250px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .toggle-btn.collapsed {
            left: 10px;
        }

        .form-container {
            padding: 20px;
        }

        .welcome-message {
            position: absolute;
            top: 10px;
            left: 300px;
            font-size: 18px;
            color: #333;
            margin-left: 10px;
            /* Tambahkan margin kiri */
        }

        .welcome-message.collapsed {
            left: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
            }

            .content {
                margin-left: 0;
            }

            .toggle-btn {
                left: 10px;
            }

            .welcome-message {
                left: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            Dashboard
        </div>
        <ul class="sidebar-menu">
            <li><a href="#" onclick="loadForm('management-user')">Management User</a></li>
            <li><a href="#" onclick="loadForm('upcoming-event')">Upcoming Event</a></li>
        </ul>
        <div class="sidebar-menu" style="position: absolute; bottom: 20px; width: 100%;">
            <li><a href="#" onclick="logout()">Logout</a></li>
        </div>
    </div>
    <div class="content" id="content">
        <div class="toggle-btn" id="toggle-btn" onclick="toggleSidebar()">
            <span>&#9776;</span>
        </div>
        <div class="welcome-message" id="welcome-message">
            Welcome, <?php echo $name; ?>
        </div>
        <div class="form-container" id="form-container">
            <!-- Form akan ditampilkan di sini -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            var content = document.getElementById('content');
            var toggleBtn = document.getElementById('toggle-btn');
            var welcomeMessage = document.getElementById('welcome-message');

            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
            toggleBtn.classList.toggle('collapsed');
            welcomeMessage.classList.toggle('collapsed');
        }

        function loadForm(formType) {
            var formContainer = document.getElementById('form-container');
            if (formType === 'management-user') {
                $.ajax({
                    url: "<?php echo site_url('user/management_user/index'); ?>",
                    type: "GET",
                    success: function(response) {
                        formContainer.innerHTML = response;
                    }
                });
            } else if (formType === 'upcoming-event') {
                $.ajax({
                    url: "<?php echo site_url('user/dashboard/get_upcoming_events'); ?>",
                    type: "GET",
                    success: function(response) {
                        formContainer.innerHTML = response;
                    }
                });
            }
        }

        function logout() {
            window.location.href = "<?php echo site_url('user/dashboard/logout'); ?>";
        }

        // Load default content (e.g., Upcoming Events)
        $(document).ready(function() {
            loadForm('upcoming-event');
        });

        // Auto collapse sidebar on small screens
        $(window).resize(function() {
            if ($(window).width() <= 768) {
                var sidebar = document.getElementById('sidebar');
                var content = document.getElementById('content');
                var toggleBtn = document.getElementById('toggle-btn');
                var welcomeMessage = document.getElementById('welcome-message');

                if (!sidebar.classList.contains('collapsed')) {
                    sidebar.classList.add('collapsed');
                    content.classList.add('collapsed');
                    toggleBtn.classList.add('collapsed');
                    welcomeMessage.classList.add('collapsed');
                }
            } else {
                var sidebar = document.getElementById('sidebar');
                var content = document.getElementById('content');
                var toggleBtn = document.getElementById('toggle-btn');
                var welcomeMessage = document.getElementById('welcome-message');

                if (sidebar.classList.contains('collapsed')) {
                    sidebar.classList.remove('collapsed');
                    content.classList.remove('collapsed');
                    toggleBtn.classList.remove('collapsed');
                    welcomeMessage.classList.remove('collapsed');
                }
            }
        });

        // Initial check on page load
        $(document).ready(function() {
            if ($(window).width() <= 768) {
                var sidebar = document.getElementById('sidebar');
                var content = document.getElementById('content');
                var toggleBtn = document.getElementById('toggle-btn');
                var welcomeMessage = document.getElementById('welcome-message');

                sidebar.classList.add('collapsed');
                content.classList.add('collapsed');
                toggleBtn.classList.add('collapsed');
                welcomeMessage.classList.add('collapsed');
            }
        });
    </script>
</body>

</html>