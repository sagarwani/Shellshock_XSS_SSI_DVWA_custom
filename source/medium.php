<?php

//Subtle change

if(isset($_GET["title"]) and $_GET["title"])
{

    // Creates the movie table
    $movies = array("CAPTAIN AMERICA", "IRON MAN", "SPIDER-MAN", "THE INCREDIBLE HULK", "THE WOLVERINE", "THOR", "X-MEN");


     // Retrieves the movie title
    $title = cow($_GET["title"]);

    // Generates the output depending on the movie title received from the client
    if(in_array(strtoupper($title), $movies))
        $string = '{"movies":[{"response":"Yes! We have that movie..."}]}';
    else

	$string = '{"movies":[{"response":"' . $title . '? Sorry, we don&#039;t have that movie :("}]}';


}

else
{

	$string = '{"movies":[{"response":"Hint: Marvel movies rock :)"}]}';
}

?>
