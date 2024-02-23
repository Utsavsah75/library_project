

                                    <?php
                                    $records_per_page = 10;
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;

                                    function getData($conn, $page, $records_per_page)
                                    {
                                        $start_from = ($page - 1) * $records_per_page;
                                        $sql = "SELECT `std_name`,`BookName`, `isbnno`, `issue_date`,`returndate`FROM issue_book JOIN students ON students.studentcode=issue_book.studentcode INNER JOIN books ON books.isbnno=issue_book.book_id LIMIT $start_from, $records_per_page";
                                        $result = $conn->query($sql);
                                        return $result;
                                    }

                                    function getTotalRecords($conn)
                                    {
                                        $sql = "SELECT COUNT(*) as total_records FROM issue_book JOIN students ON students.studentcode=issue_book.studentcode INNER JOIN books ON books.isbnno=issue_book.book_id";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        return $row['total_records'];
                                    }

                                    $result = getData($conn, $page, $records_per_page);
                                    $total_records = getTotalRecords($conn);
                                    $total_pages = ceil($total_records / $records_per_page);

                                    echo "Showing <b>" . (($page * $records_per_page) - $records_per_page + 1) . "</b> to <b>" . min(($page * $records_per_page), $total_records) . "</b> of <b>$total_records</b> entries";
?>
                            <nav aria-label="Page navigation">
    <ul class="pagination" style=" margin-top: -1.5rem;margin-left: 65rem;">
        <?php
        if ($page > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . "' aria-label='Previous'><span aria-hidden='true'>previous</span></a></li>";
        } else {
            echo "<li class='page-item disabled'><span class='page-link' style='cursor: default;'>previous</span></li>";
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
            } else {
                echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
            }
        }

        if ($page < $total_pages) {
            echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "' aria-label='Next'><span aria-hidden='true'>Next</span></a></li>";
        } else {
            echo "<li class='page-item disabled'><span class='page-link' style='cursor: default;'>Next</span></li>";
        }
        $sql = getData($conn, $page, $records_per_page);
        ?>
    </ul>
</nav>
