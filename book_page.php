<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="book_pag.css">
</head>

<body>
    <div class="datetime">
        <p class="time"></p>
        <p class="date"></p>
    </div>
    <div class="library-contain">
        <div class="library-container">
            <div class="top">
                <marquee class="marquee" direction="alternate" scrollamount="12" onmouseover="this.stop()" onmouseout="this.start()"><b>Welcome To Library</b></marquee>
            </div>
            <div class="top1">
                <ul>
                    <li><a href="#"><i class="fa fa-book"></i>All Books</a></li>
                    <li><a href="#"><i class="fa fa-users"></i>All Members</a></li>
                    <li><a href="#"><i class="fas fa-shopping-cart"></i>Borrow History</a></li>
                    <li><a href="#"><i class="fa fa-hourglass-half"></i>Pending List</a></li>
                    <li><a href="#"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container1">
        <div class="library-container2">
            <ul>
                <li><a href="#">Add Books</a></li>
                <li><a href="#">Manage Books</a></li>
                <li><a href="#">Borrow Books</a></li>
                <li><a href="#">Return Books</a></li>
                <li><a href="#">Add User</a></li>
                <li><a href="#">Manage Users</a></li>
            </ul>
        </div>
    </div>

    <script>
        const timeElement = document.querySelector(".time");
        const dateElement = document.querySelector(".date");

        /**
         * @param {Date} date
         */
        function formatTime(date) {
            const hours12 = date.getHours() % 12 || 12;
            const minutes = date.getMinutes();
            const seconds = date.getSeconds();
            const isAm = date.getHours() < 12;

            return `${hours12.toString().padStart(2, "0")}:${minutes
            .toString()
            .padStart(2, "0")}:${seconds.toString().padStart(2, "0")} ${isAm ? "AM" : "PM"}`;
        }

        /**
         * @param {Date} date
         */
        function formatDate(date) {
            const DAYS = [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday"
            ];
            const MONTHS = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ];

            return `${DAYS[date.getDay()]}, ${MONTHS[date.getMonth()]} ${date.getDate()} ${date.getFullYear()}`;
        }

        // Initial update
        const now = new Date();
        timeElement.textContent = formatTime(now);
        dateElement.textContent = formatDate(now);

        // Update every second
        setInterval(() => {
            const now = new Date();

            timeElement.textContent = formatTime(now);
            dateElement.textContent = formatDate(now);
        }, 1000);
    </script>
</body>

</html>