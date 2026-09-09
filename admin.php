<?php
include 'db.php';

// নতুন ম্যাচ অ্যাড করার কোড
if (isset($_POST['add_match'])) {
    $match_name = $_POST['match_name'];
    $match_time = $_POST['match_time'];
    
    $sql = "INSERT INTO matches (match_name, match_time, status) VALUES ('$match_name', '$match_time', 'Live')";
    if ($conn->query($sql) === TRUE) {
        $msg = "নতুন সাইবার ম্যাচ সফলভাবে যোগ করা হয়েছে!";
    } else {
        $msg = "ত্রুটি: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Cyber Sports</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        👑 Admin Control Panel
    </header>
    <div class="container" style="max-width: 500px; margin: auto; text-align: left;">
        <?php if(isset($msg)) { echo "<p style='color: #4ade80; font-weight: bold;'>$msg</p>"; } ?>
        
        <h3>🎮 নতুন সাইবার ম্যাচ যোগ করুন</h3>
        <form method="POST" action="">
            <label>ম্যাচের নাম (যেমন: Cyber FIFA - Team A vs Team B):</label><br>
            <input type="text" name="match_name" required style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border-radius: 4px; border: 1px solid #ccc;"><br>
            
            <label>ম্যাচের সময় / স্ট্যাটাস:</label><br>
            <input type="text" name="match_time" required style="width: 100%; padding: 8px; margin: 5px 0 15px 0; border-radius: 4px; border: 1px solid #ccc;"><br>
            
            <button type="submit" name="add_match" style="background: #38bdf8; color: #0f172a; padding: 10px 20px; border: none; font-weight: bold; border-radius: 4px; cursor: pointer; width: 100%;">ম্যাচ পাবলিশ করুন</button>
        </form>

        <hr style="margin: 30px 0; border-color: #334155;">

        <h3>💳 ইউজারদের পেমেন্ট / ট্রানজ্যাকশন লিস্ট</h3>
        <p>এখানে ইউজারের পাঠানো বিকাশ/নগদের TrxID শো করবে (পরবর্তীতে ডাটাবেজ টেবিল সহ কানেক্ট করা হবে)।</p>
        
        <br>
        <a href="matches.php" style="color: #38bdf8; text-decoration: none;">← ম্যাচ ও পেমেন্ট পেজে ফিরে যান</a>
    </div>
</body>
</html>
