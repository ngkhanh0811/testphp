<html>
    <body>
        <?php
        $d = Date("D");
        if($d == "Fri"){
            echo "Have a nice weekend!";
        } else{
            echo "Have a nice day!</br>";
        }

        switch ($d){
            case "Mon":
                echo "Today is Monday";
                break;
            case "Tue":
                echo "Today is Tuesday";
                break;
            case "Wed":
                echo "Today is Wednesday";
                break;
            case "Thu":
                echo "Today is Thursday";
                break;
            case "Fri":
                echo "Today is Friday";
                break;
            case "Sat":
                echo "Today is Saturday";
                break;
            case "Sun":
                echo "Today is Sunday";
                break;
            default:
                echo "Wonder which day is this?";
                break;
        }
        ?>
    </body>
</html>