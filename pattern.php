<?php 
// Php code to demonstrate 
// star pattern 

// Function to demonstrate 
// printing pattern 
$n = 5; 
	// Outer loop to handle number 
    // of rowsn in this case 
   
	for ($i = 1; $i <= $n; $i++) 
	{ 
        for ($k= 0;$k<$n-$i; $k++)
        { 
           
            echo "$ ";
            
                
             
         } 
		// inner loop to handle 
		// number of columns 
		// values changing acc. 
		// to outer loop 
		for($j = 1; $j <= 2*$i - 1; $j++ ) 
		{ 
           
           echo "* ";
           
               
			
		} 
        
		// ending line after 
		// each row 
		echo "\n<br/>"; 
	} 	// Driver Code 
	
?> 
