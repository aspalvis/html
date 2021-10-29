<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribers</title>
    <link rel="stylesheet" href="css/data.css">
    <link rel="icon" href="images/Union.svg">
</head>
<body>
    <h1>
        Database structure
    </h1>
    <div class="export_panel">
        <form method="GET" id="sel_tb_form" action="includes/db_structure.php">
            <div class="sel-tab">
                <label for="tables">Choose a table:</label>
                <select name="tables" id="tables">
                    <option value="email">Email</option>
                    <option value="email_platform">Platforms</option>
                    <option value="join">Joined</option>
                </select>
                <button id="show-tb">Show</button>
            </div>
        </form>
        <form method="GET" id="sel_pl_form" action="includes/db_structure.php">
            <div class="sel-platform">
                <label for="platforms">Choose a platform:</label>
                <select name="platforms" id="platforms">
                    <?php
                        require_once "includes/db.php";

                        $platforms = mysqli_query($connection,"SELECT `platform_name` 
                        FROM `email_platform`
                        ORDER BY `platform_name`;");
                        while ($record = mysqli_fetch_assoc($platforms)) {
                            echo    (
                                '<option value="'.$record['platform_name'].'">'.$record['platform_name'].'</option>'
                            );
                        }
                    ?>
                </select>
                <button type="submit" id="show-pl">Show</button>
            </div>
        </form>
        <form method="GET" id="export_form" action="includes/db_structure.php">
            <div class="sel-export">
                <label for="csv_exp">Choose a table to export:</label>
                <select name="csv_exp" id="csv_exp">
                    <option value="email">Email</option>
                    <option value="email_platform">Platforms</option>
                    <option value="join">Joined</option>
                </select>
                <button id="export-csv">Export</button>
            </div>
        </form>

        
    </div>
</body>
</html>