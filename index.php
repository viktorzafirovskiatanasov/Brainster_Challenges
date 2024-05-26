<?php
$rating = "1";
$name = "Random";
if ($name == 'Kathrin') {
  echo "Hello $name";
} else {
  echo 'Nice name';
}
echo "<br/>";
if ($rating > 0 && $rating <= 10 ) {
  echo 'Thanks for voting';
} else
  echo 'Invalid rating, only numbers between 1 and 10.';
echo "<br/><br/><hr />";

echo gettype($rating);
echo "<br/><br/>";
$rated = false;
if ($rating > 0 && $rating <= 10 && $rated == false) {
  echo 'Thanks for voting';
} else if ($rating < 0 || $rating > 10) {
  echo 'Invalid rating, only numbers between 1 and 10.';
} else echo "You already voted";


echo "<br/><br/>";
$time = date("h");
if ($time < 12) {
  echo "Good morning Kathrin";
} else if ($time > 12 && $time < 19) {
  echo "Good afternoon Kathrin";
} else {
  echo "Good evening Kathrin";
}
echo "<br/><br/> <hr />";
$voters = [
  'Viktor' => false . "," . 1,
  'Nikola' => false . "," . 2,
  'Mihaela' => false . "," . 3,
  'Marko' => true . "," . 4,
  'Kristijan' => false . "," . 5,
  'Ahmed' => true . "," . 6,
  'Denis' => true . "," . 7,
  'Elena' => true . "," . 8,
  'Marija' => false . "," . 9,
  'Verce' => false . "," . 10
];
foreach ($voters as $name => $value) {
  $parts = explode(',', $value);
  $hasVoted = $parts[0];
  $grade = $parts[1];

  if ($time < 12) {
    echo "Good morning $name <br/>";
  } else if ($time > 12 && $time < 19) {
    echo "Good afternoon $name <br/>";
  } else {
    echo "Good evening $name <br/>";
  }


  if ($grade > 0 && $grade <= 10 && $hasVoted == "false") {
    echo "Thanks for voting with: $grade<br/>";
  } else if ($grade < 0 || $grade > 10) {
    echo 'Invalid rating, only numbers between 1 and 10.<br/>';
  } else {
    echo "You already voted with: $grade <br/>";
  }
  echo "<br/><br/>";
}
