<?php
define("IN_SITE", true);
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';

// Fetch users from the database
$result = $ketnoi->query("SELECT * FROM users");
$now = date('Y-m-d H:i:s'); // Get current time

// Define the list of activities
$activities = ['Mua mã nguồn', 'Buy Domain'];

// Specify the number of times to spam
$spam_count = 20; // Số lần Tạo Giao Dịch

while ($user = $result->fetch_array()) {
    for ($i = 0; $i < $spam_count; $i++) {
        // Generate a random username
        $random_username = 'User' . rand(1000, 9999); // Example format: UserXXXX
        // Generate a random even price
        $random_price = rand(5000, 250000) * 2; // Price between 10,000 and 500,000 (even numbers)
        // Randomly select an activity
        $random_activity = $activities[array_rand($activities)];

        // Your further logic here

        // Insert activity log into the database
        $ketnoi->query("INSERT INTO lich_su_hoat_dong SET 
            username = '$random_username',
            hoatdong = '$random_activity',
            gia = '$random_price',
            time = '$now'");
            
            $max_logs = 200; // Set a threshold
$count_logs = $ketnoi->query("SELECT COUNT(*) FROM lich_su_hoat_dong")->fetch_array()[0];
if ($count_logs > $max_logs) {
    $ketnoi->query("DELETE FROM lich_su_hoat_dong ORDER BY time ASC LIMIT " . ($count_logs - $max_logs));
}

    }
}

?>