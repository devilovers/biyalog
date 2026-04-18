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
    </style>
</head>

<body class="bg-[#d6d1c4] flex justify-center items-center min-h-screen">

<div class="bg-[#fdf6e3] w-[340px] p-6 shadow-xl">

    <h2 class="text-center text-lg tracking-widest mb-4">
        ADD TRACK
    </h2>

    <form action="ignite.php" method="POST" class="space-y-4">

        <input type="text" name="title" placeholder="Track name"
            class="w-full bg-transparent border-b border-dashed border-black focus:outline-none">

        <input type="text" name="artist" placeholder="Artist"
            class="w-full bg-transparent border-b border-dashed border-black focus:outline-none">

        <input type="text" name="duration" placeholder="Duration (3:45)"
            class="w-full bg-transparent border-b border-dashed border-black focus:outline-none">

        <button type="submit"
            class="w-full mt-4 border border-black py-2 hover:bg-black hover:text-white transition">
            + ADD TO LOG
        </button>

    </form>

</div>

</body>
</html>