<!-- table-template.php -->
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>City</th>
            <th>Friend</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["Name"] . '</td>';
            echo '<td>' . $row["City"] . '</td>';
            echo '<td>' . $row["Friend"] . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
