<?php
                     session_start();
                     $mytime=1800;
                     if(!isset($_SESSION['time']))
                     {
                        $_SESSION['time']=time(); 
                     }
                     else{
                        $diff=time()-$_SESSION['time'];
                        $diff=$mytime-$diff;
                        // $hours=floor($diff/60);
                        $minute=(int)($diff/60);
                        $second=$diff%60;

                        $show=$minute." minutes:".$second." seconds";

                    
                        echo $show;
              
                     }
?>          