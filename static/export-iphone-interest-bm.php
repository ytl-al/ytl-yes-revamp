<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-config.php');

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, MYSQL_SSL_CA, NULL, NULL);
mysqli_options($conn, MYSQLI_OPT_CONNECT_TIMEOUT, 10);
mysqli_options($conn, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
mysqli_real_connect($conn, DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);
// $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$query  = "SELECT * FROM yes_formmaker_submits WHERE form_id = 23";
$result = mysqli_query($conn, $query);
// $rows   = mysqli_fetch_array($result);

$arr_results    = [];
while ($row = mysqli_fetch_array($result)) {
    // echo '<pre>'; print_r($row); echo '</pre>';
    $group_id   = $row['group_id'];
    $key        = '';
    switch ($row['element_label']) {
        case 8:
            $key = 'name';
            break;
        case 3:
            $key = 'email';
            break;
        case 9:
            $key = 'phone_no';
            break;
        case 5:
            $key = 'device';
            break;
        case 6:
            $key = 'location';
            break;
    }
    if ($key != '') {
        $arr_results[$group_id][$key]    = $row['element_value'];
        $arr_results[$group_id]['submitted_at'] = $row['date'];
    }
}

$cur_time   = time();
$timestamp  = date('Y-m-d', $cur_time);

ob_start();
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=iphone_interest_BM_' . $timestamp . '_ytldd.csv');

$data_head  = ['No', 'Name', 'Email', 'Phone No.', 'Preferred Device', 'Location', 'Submitted On'];
$data       = [];
$count      = 1;
foreach ($arr_results as $result) {
    $name           = isset($result['name']) ? $result['name'] : '';
    $email          = isset($result['email']) ? $result['email'] : '';
    $phone_no       = isset($result['phone_no']) ? $result['phone_no'] : '';
    $device         = isset($result['device']) ? $result['device'] : '';
    $location       = isset($result['location']) ? $result['location'] : '';
    $submitted_at   = isset($result['submitted_at']) ? $result['submitted_at'] : '';

    $data[] = [$count, $name, $email, $phone_no, $device, $location, $submitted_at];
    $count++;
}
ob_end_clean();

// Create a file pointer with PHP.
$output = fopen('php://output', 'w');

// Write headers to CSV file.
fputcsv($output, $data_head);

// Loop through the prepared data to output it to CSV file.
foreach ($data as $data_item) {
    fputcsv($output, $data_item);
}

// Close the file pointer with PHP with the updated output.
fclose($output);
exit;

// echo '<pre>'; print_r($arr_results); echo '</pre>';

$html   = ' <table class="table">
                <thead>

                </thead>
            </table>';
?>

<table class="table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No.</th>
            <th>Preferred Device</th>
            <th>Submitted On</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i = 1;
            foreach ($arr_results as $result) : 
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $result['name']; ?></td>
            <td><?php echo $result['email']; ?></td>
            <td><?php echo $result['phone_no']; ?></td>
            <td><?php echo $result['device']; ?></td>
            <td><?php echo $result['location']; ?></td>
            <td><?php echo $result['submitted_at']; ?></td>
        </tr>
        <?php 
            $i++;
            endforeach;
        ?>
    </tbody>
</table>