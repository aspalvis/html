<?php
    include "db.php";
    include "config.php";
    $tables=$_GET['tables'];
    $platforms=$_GET['platforms'];
    $export=$_GET['csv_exp'];
    if ($tables!=null) {
        if ($tables=='join') {
            echo ('
            <table style="width:100%;border:1px solid black">
                <tr>
                    <th>em_id</th>
                    <th>address</th>
                    <th>platform_id</th>
                    <th>platform_name</th>
                </tr>
            ');
            $sql_tables = mysqli_query($connection,"SELECT * FROM email 
            INNER JOIN email_platform ON email.platform_id = email_platform.platform_id ORDER BY platform_name;");
            while ($record = mysqli_fetch_assoc($sql_tables)) {
                echo    (
                '<tr style="text-align:center"><td>'.$record['em_id'].'</td><td>'.$record['address'].'</td><td>'.$record['platform_id'].'</td><td>'.$record['platform_name'].'</td></tr>'
                );
            }
            echo ('</table>');

        }else {
            $sql_tables = mysqli_query($connection,"SELECT * FROM `$tables`;");
            if ($tables=='email') {
                echo ('
                <table style="width:100%;border:1px solid black">
                    <tr>
                        <th>em_id</th>
                        <th>address</th>
                        <th>platform_id</th>
                    </tr>
                ');
                while ($record = mysqli_fetch_assoc($sql_tables)) {
                    echo    (
                        '<tr style="text-align:center"><td>'.$record['em_id'].'</td><td>'.$record['address'].'</td><td>'.$record['platform_id'].'</td></tr>'
                    );
                }
                exit();
            }
            if ($tables=='email_platform') {
                echo ('
                <table style="width:100%;border:1px solid black">
                    <tr>
                        <th>platform_id</th>
                        <th>platform_name</th>
                    </tr>
                ');
                while ($record = mysqli_fetch_assoc($sql_tables)) {
                    echo    (
                        '<tr style="text-align:center"><td>'.$record['platform_id'].'</td><td>'.$record['platform_name'].'</td></tr>'
                    );
                }
                exit();
            }
        }
        

    }
    if ($platforms!=null) {
        $sql_platforms = mysqli_query($connection,"SELECT * FROM email 
        INNER JOIN email_platform ON (email.platform_id = email_platform.platform_id) WHERE (email_platform.platform_name = '$platforms') ORDER BY platform_name;");
        echo ('
            <table style="width:100%;border:1px solid black">
                <tr>
                    <th>email_addr</th>
                    <th>platform_id</th>
                    <th>platform_name</th>
                </tr>
            ');
            while ($record = mysqli_fetch_assoc($sql_platforms)) {
                echo    (
                    '<tr style="text-align:center"><td>'.$record['address'].'</td><td>'.$record['platform_id'].'</td><td>'.$record['platform_name'].'</td></tr>'
                );
            }
            exit();
    }
        if ($export!=null) {
            if ($export=='join') {
                $allData="";
                $sql=$connection->query("SELECT * FROM email 
                INNER JOIN email_platform ON email.platform_id = email_platform.platform_id ORDER BY em_id;");
                while ($data = $sql->fetch_assoc()) {
                            $allData.=$data['em_id'].','.$data['address'].','.$data['platform_name'].','.$data['platform_id']."\n";
                }
                $response="data:text/csv;charset=utf-8,EMAIL ID,ADDRESS,PLATFORM,PLATFORM ID\n";
                $response.=$allData;
                echo ('
                        <center style="height:100vh; display:flex;
                        justify-content:center;align-items:center;">
                
                        <a style="background-color: #4CAF50;font-size: 16px;
                        padding: 14px 40px;border-radius: 8px;
                        text-decoration:none;color:white;"
                        href="'.$response.'" download="joinedTable.csv">Download</a></center>');
                exit();

            }else {
                $allData="";
                if ($export=='email') {
                    $sql=$connection->query("SELECT * FROM `$export` ORDER BY `em_id`;");
                    while ($data = $sql->fetch_assoc()) {
                        $allData.=$data['em_id'].','.$data['address'].','.$data['platform_id']."\n";
                    }
                    $response="data:text/csv;charset=utf-8,EMAIL ID,ADDRESS,PLATFORM ID\n";
                    $response.=$allData;
                    echo ('
                            <center style="height:100vh; display:flex;
                            justify-content:center;align-items:center;">
                    
                            <a style="background-color: #4CAF50;font-size: 16px;
                            padding: 14px 40px;border-radius: 8px;
                            text-decoration:none;color:white;"
                            href="'.$response.'" download="emailTable.csv">Download</a></center>');
                    exit();
                }
                if ($export=='email_platform') {
                    $sql=$connection->query("SELECT * FROM `$export` ORDER BY `platform_id`;");
                    while ($data = $sql->fetch_assoc()) {
                        $allData.=$data['platform_id'].','.$data['platform_name']."\n";
                    }
                    $response="data:text/csv;charset=utf-8,PLATFORM ID,PLATFORM\n";
                    $response.=$allData;
                    echo ('
                            <center style="height:100vh; display:flex;
                            justify-content:center;align-items:center;">
                    
                            <a style="background-color: #4CAF50;font-size: 16px;
                            padding: 14px 40px;border-radius: 8px;
                            text-decoration:none;color:white;"
                            href="'.$response.'" download="platformTable.csv">Download</a></center>');
                    exit();
                }

                }
            }
            
    
?>