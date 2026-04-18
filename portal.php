<?php
include "core.php";
$data = mysqli_query($core, "SELECT * FROM tracks ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>biyalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Special+Elite&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Special Elite', monospace;
        }

        .tear {
            position: relative;
        }

        .tear::after {
            content: "";
            position: absolute;
            bottom: -15px;
            left: 0;
            width: 100%;
            height: 20px;
            background: repeating-linear-gradient(
                -45deg,
                #fdf6e3,
                #fdf6e3 5px,
                transparent 5px,
                transparent 10px
            );
        }
    </style>
</head>

<body class="bg-[#d6d1c4] flex justify-center items-center min-h-screen">

<div class="bg-[#fdf6e3] w-[340px] p-6 shadow-xl tear">

    <div class="text-center">
        <h1 class="text-xl tracking-widest">BIYALOG</h1>
        <p class="text-xs opacity-60">Analog Session</p>
    </div>

    <div class="border-t border-dashed border-black my-4"></div>

    <div class="text-sm space-y-1">
        <?php $no = 1; ?>
        <?php while($row = mysqli_fetch_assoc($data)) { ?>
            <div class="flex justify-between">
                <span>
                    <?= str_pad($no, 2, "0", STR_PAD_LEFT) ?>
                    <?= strtoupper($row['title']) ?>
                </span>
                <span><?= $row['duration'] ?></span>
            </div>
            <div class="text-xs opacity-70 mb-2">
                <?= strtoupper($row['artist']) ?>
            </div>
        <?php $no++; } ?>
    </div>

    <div class="border-t border-dashed border-black my-4"></div>

    <div class="text-xs text-center space-y-1">
        <p><?= date("d/m/Y") ?></p>
        <p class="opacity-50">BIYA RECEIPT SYSTEM</p>
    </div>

</div>

</body>
</html>