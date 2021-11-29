<!DOCTYPE html>
<html lang="fi">
    <head>
        <title>R0skis :)</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Syncopate&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css" type="text/css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
    $(document).ready(function(){
		 $(".trash_data").load("partials/load.php");
        setInterval(function() {
            $(".trash_data").load("partials/load.php");
        }, 1000);
    });
 
</script>
</head>
<body>