<?php 
include 'header.php';
include 'ft.php';
include 'db.php';
 ?>

<?php
    $records_per_page = isset($_GET['records_per_page']) ? intval($_GET['records_per_page']) : 10;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $records_per_page;

    $sql = "SELECT * FROM signup  LIMIT ?, ?";
    $query = $con->prepare($sql);
    $query->bind_param('ii', $offset, $records_per_page); 
    $query->execute();
    $result = $query->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    $total_records_query = $con->query("SELECT COUNT(*) FROM signup");
    $total_records = $total_records_query->fetch_row()[0];
    $total_pages = ceil($total_records / $records_per_page);
    ?>
<section class="content">
    <div class="container w-60">
        <h2 class="text-center p-2" style="color:#666;">User's Information</h2>

        <div class="pdf_excel">
            <div id="pdf">
                <form method="GET" action="export_pdf.php">
                    <input type="hidden" name="blood_group" value="<?php echo $blood_group; ?>">
                    <input type="hidden" name="date" value="<?php echo $date; ?>">
                    <button type="submit" class="btn btn-danger"> Export
                        to PDF</button>
                </form>
            </div>
            <div id="excell">
                <form method="GET" action="export_excel.php">
                    <input type="hidden" name="blood_group" value="<?php echo $blood_group; ?>">
                    <input type="hidden" name="date" value="<?php echo $date; ?>">
                    <button class="btn btn-success" name="export">
                        Export to Excel</button>
                </form>
            </div>
        </div>
        <div class="table-search">
            <div class="pagination-options">
                <label for="rows-per-page">Rows per page:</label>
                <select id="rows-per-page" onchange="changeRowsPerPage(this.value)">
                    <option value="5" <?php if ($records_per_page == 5) echo 'selected'; ?>>5</option>
                    <option value="10" <?php if ($records_per_page == 10) echo 'selected'; ?>>10</option>
                    <option value="20" <?php if ($records_per_page == 20) echo 'selected'; ?>>20</option>
                    <option value="50" <?php if ($records_per_page == 50) echo 'selected'; ?>>50</option>
                </select>
            </div>
            <div class="search-container">
                <input type="text" id="search-input" class="form-control mr-sm-2" oninput="searchTable()"
                    placeholder="Search...">
            </div>
        </div>
        <div class="table">
            <table class="table table-striped table-bordered text-center w-70 ms-3 mt-1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="donorTableBody">
                    <?php if ($rows): ?>
                    <?php $i = ($page - 1) * $records_per_page; ?>
                    <?php foreach ($rows as $data): ?>
                    <tr>
                        <td><?php echo ++$i;?></td>
                        <td><?php echo $data['Firstname'];?></td>
                        <td><?php echo $data["Lastname"];?></td>
                        <td><?php echo $data["Address"];?></td>
                        <td><?php echo $data["Email"];?></td>
                        <td>
                            <a href="deleteuser.php"> <button class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="12">Record not found.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if ($total_pages > 1){ ?>
        <div class="pagination">
            <?php if ($page > 1){ ?>
            <a href="?page=1&records_per_page=<?php echo $records_per_page; ?>">&laquo; First</a>
            <a href="?page=<?php echo ($page - 1); ?>&records_per_page=<?php echo $records_per_page; ?>">&lsaquo;
                Previous</a>
            <?php } ?>
            <?php for ($i = max(1, $page - 5); $i <= min($page + 5, $total_pages); $i++){ ?>
            <a href="?page=<?php echo $i; ?>&records_per_page=<?php echo $records_per_page; ?>"
                <?php if ($i === $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
            <?php } ?>
            <?php if ($page < $total_pages){ ?>
            <a href="?page=<?php echo ($page + 1); ?>&records_per_page=<?php echo $records_per_page; ?>">Next
                &rsaquo;</a>
            <a href="?page=<?php echo $total_pages; ?>&records_per_page=<?php echo $records_per_page; ?>">Last
                &raquo;</a>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>

<script>
//***** pagination******
function changeRowsPerPage(rows) {
    let urlParams = new URLSearchParams(window.location.search);
    urlParams.set("page", "1");
    urlParams.set("records_per_page", rows);
    window.location.search = urlParams.toString();
}
//***table search */
function searchTable() {
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search-input");
    filter = input.value.toUpperCase();
    table = document.querySelector(".table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (let j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}
</script>