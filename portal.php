<?php
include "core.php";
$data = mysqli_query($core, "SELECT * FROM tracks ORDER BY id ASC");

$totalSeconds = 0;
$tracks = [];

while($row = mysqli_fetch_assoc($data)) {
    $tracks[] = $row;

    if (!empty($row['duration']) && strpos($row['duration'], ':') !== false) {
        list($min, $sec) = explode(":", $row['duration']);
        $totalSeconds += ($min * 60) + $sec;
    }
}

$totalMinutes = floor($totalSeconds / 60);
$remainingSeconds = $totalSeconds % 60;

$totalTime = sprintf("%02d:%02d", $totalMinutes, $remainingSeconds);
$itemCount = count($tracks);
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

<body class="bg-[#d6d1c4] flex flex-col justify-center items-center min-h-screen">

<div id="receipt" class="bg-[#fdf6e3] w-[340px] p-6 shadow-xl tear">

    <div class="text-center">
        <h1 class="text-xl tracking-widest">BIYALOG</h1>
        <p class="text-xs opacity-60">Analog Session</p>
    </div>

    <div class="border-t border-dashed border-black my-4"></div>

    <div class="text-sm space-y-1">
        <?php $no = 1; ?>
        <?php foreach($tracks as $row) { ?>
            <div class="flex justify-between items-center">
                <span>
                    <?= str_pad($no, 2, "0", STR_PAD_LEFT) ?>
                    <?= strtoupper($row['title']) ?>
                </span>

                <div class="flex items-center gap-2">
                    <span><?= $row['duration'] ?></span>

                    <a href="purge.php?erase=<?= $row['id'] ?>"
                       onclick="return confirm('hapus lagu ini?')"
                       class="text-red-500 text-xs hover:underline">
                       x
                    </a>
                </div>
            </div>

            <div class="text-xs opacity-70 mb-2">
                <?= strtoupper($row['artist']) ?>
            </div>
        <?php $no++; } ?>
    </div>

    <div class="border-t border-dashed border-black my-4"></div>

    <div class="text-xs text-center space-y-1">
        <p>ITEMS: <?= $itemCount ?></p>
        <p>TOTAL: <?= $totalTime ?></p>
        <p><?= date("d/m/Y") ?></p>
        <p class="opacity-50">BIYA RECEIPT</p>
    </div>

</div>

<div class="mt-6 flex flex-col items-center gap-2">

    <button onclick="downloadReceipt()"
        class="px-4 py-2 border border-black text-sm hover:bg-black hover:text-white transition">
        ⬇ download receipt
    </button>

    <a href="purge.php?obliterate=true"
       onclick="return confirm('hapus semua data?')"
       class="text-xs text-gray-600 hover:text-black underline">
       reset receipt
    </a>

</div>

<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

<script>
function downloadReceipt() {
    const receipt = document.getElementById("receipt");

    html2canvas(receipt, {
        scale: 2,
        backgroundColor: "#fdf6e3"
    }).then(canvas => {
        const link = document.createElement("a");

        const now = new Date();
        const filename = "biyalog-" + now.getFullYear() + "-" + 
                         (now.getMonth()+1) + "-" + 
                         now.getDate() + ".png";

        link.download = filename;
        link.href = canvas.toDataURL("image/png");
        link.click();
    });
}
</script>

</body>
</html>