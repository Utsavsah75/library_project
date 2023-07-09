<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book_Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            height: 100%;
            width: 100%;
            background: url(library2.jpg);
            background-size: cover;
            background-attachment: fixed;
        }

        .top1 {
            width: 80%;
            height: 35px;
            margin-top: 0px;
            /* font-weight: bold; */
            line-height: 35px;
            margin-left: 300px;
            word-spacing: 0px;
            background: #c5c6d0;
            box-sizing: border-box;
            padding: 0px 20px 9px 100px;

        }
        .top {
            margin-top: -120px;
            height: 35px;
            width: 80%;
            line-height: 35px;
            margin-left: 300px;
            font-size: 40px;
        }
        ul {
            list-style-type: none;
            padding: 0px;
            margin: 20px;
            display: flex;
        }
        .top1 li {
            border-radius: 5px;
            padding: 0px;
            margin-bottom: 10px;
            color: #333333;
            background-color: #e6e6e6;
            margin-left: 60px;
            cursor: pointer;
            width: 120px;
            text-align: center;
        }
        .top1 li:hover {
            background-color: #d4d4d4;
        }
        li a {
            color: #333333;
            text-decoration: none;
        }
        .side ul {
            list-style-type: none;
            padding: 0;
            margin: 0;  
        }
        .side li {
            padding: 0;
            margin: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            margin-bottom: 80px;
            color: #333333;
            background-color: #e6e6e6;
            margin-left: 185px;
            cursor: pointer;
            width: 120px;
            height: 35px;
        }
        .side a {
            text-decoration: none;
            color: #000;
        }
        .side li:hover {
    background-color: #d1d1d1;
}
.datetime {
    margin-top: 10px;
    margin-left: 10px;
  font-size: 10px;
  padding: 10px;
  color: #ffffff;
  background: #444444;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
  border-radius: 20px;
  border-right: 5px #009578 solid;
  width: 175px;
  font-weight: 500;
}

.time {
    align-items: center;
  font-size: 2em;
  color: #00ffcc;
}

.date {
  margin-top: 12px;
  font-size: 1.75em;
}

    </style>
</head>

<body>
<div class="datetime">
    <p class="time"></p>
    <p class="date"></p>
</div>

    <div class="top">
        <marquee id="mar" bgcolor="red" direction="alternate" scrollamount="12" onmouseover="mar.stop()" onmouseout="mar.start()"><b>Wel-Come <b style="color:#2c7ad6 ;">To</b> Library</b></marquee>
    </div>
    <div class="top1">
        <ul>
            <li><a href="#"><i class="fa fa-book"></i>All Books</a></li>
            <li><a href="#"><i class="fa fa-users"></i>All Members</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i>Borrow Histry</a></li>
            <li><a href="#"><i class="fa fa-hourglass-half"></i>Pending List</a></li>
            <li><a href="#"><i class="fa fa-sign-out-alt"></i>Logout</a></li>
        </ul>
    </div>
    <div class="side">
        <td>
            <li><a href="#">Add Books</a></li>
            <li><a href="#">Add Members</a></li>
            <li><a href="#">Return Books</a></li>
            <li><a href="#">Borrow Books</a></li>

        </td>
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

        return `${DAYS[date.getDay()]}, ${
            MONTHS[date.getMonth()]
        } ${date.getDate()} ${date.getFullYear()}`;
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