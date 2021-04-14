<?php
$sayTimes = $this->session->userdata('say_times');
if(!isset($sayTimes))
{
    echo $this->session->userdata('say');
}
else
{
    if(!is_numeric($sayTimes))
    {
        echo "Sorry.  This url does not meet our requirement.";
    }
    else
    {
        for($i = 1; $i <= $sayTimes; $i++)
        {  
            echo $i . " " . $this->session->userdata('say')."<br>";
        }
    }
}

?>