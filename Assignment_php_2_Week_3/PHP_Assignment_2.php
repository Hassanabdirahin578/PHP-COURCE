<!DOCTYPE html>
<html>
<head>
    <title>PHP Assignment 2</title>
    <style>
        body { font-family: Arial; background:#f2f2f2; margin:30px; }
        .container { width:90%; margin:auto; }
        .header { background:#2563eb; color:white; text-align:center; padding:20px; border-radius:10px; }
        .question { background:white; margin-top:20px; padding:20px; border-radius:10px; }
        h2 { color:#2563eb; }
        table { border-collapse:collapse; width:100%; margin-top:15px; }
        th { background:#2563eb; color:white; }
        th,td { border:1px solid #999; padding:10px; text-align:center; }
        .result { background:#eef4ff; padding:10px; margin:5px 0; }
        .pass { color:green; font-weight:bold; }
        .fail { color:red; font-weight:bold; }
    </style>
</head>
<body>
<div class="container">

<div class="header">
    <h1>PHP Assignment 2</h1>
    <p>PHP & MySQL</p>
    <p>Jamhuriya University of Science & Technology</p>
    <p>Faculty of Computer & IT</p>
</div>

<div class="question">
<h2>Question 1: One-Dimensional Array</h2>
<?php
$numbers = array(5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9);

echo "<b>All elements:</b><br>";
foreach ($numbers as $number) echo $number . " ";
echo "<br><br>";

$total = 0;
$evenTotal = 0;
$oddTotal = 0;

foreach ($numbers as $number) {
    $total = $total + $number;
    if ($number % 2 == 0) $evenTotal = $evenTotal + $number;
    else $oddTotal = $oddTotal + $number;
}

$minimum = $numbers[0];
$maximum = $numbers[0];

foreach ($numbers as $number) {
    if ($number < $minimum) $minimum = $number;
    if ($number > $maximum) $maximum = $number;
}

echo "<div class='result'><b>Total:</b> $total</div>";
echo "<div class='result'><b>Even total:</b> $evenTotal</div>";
echo "<div class='result'><b>Odd total:</b> $oddTotal</div>";

echo "<div class='result'><b>Minimum:</b> $minimum<br><b>Positions:</b> ";
foreach ($numbers as $position => $number) {
    if ($number == $minimum) echo $position . " ";
}
echo "</div>";

echo "<div class='result'><b>Maximum:</b> $maximum<br><b>Positions:</b> ";
foreach ($numbers as $position => $number) {
    if ($number == $maximum) echo $position . " ";
}
echo "</div>";
?>
</div>

<div class="question">
<h2>Question 2: Two-Dimensional Associative Array</h2>
<?php
$colors = array(
    "Light" => array("Red"=>"Light Red", "Green"=>"Light Green", "Blue"=>"Light Blue"),
    "Normal" => array("Red"=>"Normal Red", "Green"=>"Normal Green", "Blue"=>"Normal Blue"),
    "Dark" => array("Red"=>"Dark Red", "Green"=>"Dark Green", "Blue"=>"Dark Blue")
);
?>
<table>
<tr><th>Row</th><th>Red</th><th>Green</th><th>Blue</th></tr>
<?php
foreach ($colors as $rowName => $row) {
    echo "<tr><td><b>$rowName</b></td>";
    foreach ($row as $value) echo "<td>$value</td>";
    echo "</tr>";
}
?>
</table>
</div>

<div class="question">
<h2>Question 3: Square Two-Dimensional Array</h2>
<?php
$matrix = array(
    array(2, -6, 8),
    array(-6, 1, 6),
    array(7, 8, -6)
);
?>
<h3>All Elements</h3>
<table>
<?php
for ($row=0; $row<3; $row++) {
    echo "<tr>";
    for ($column=0; $column<3; $column++) {
        echo "<td>".$matrix[$row][$column]."</td>";
    }
    echo "</tr>";
}
?>
</table>

<?php
$oddTotal=0;
$evenTotal=0;
$allTotal=0;

for ($row=0; $row<3; $row++) {
    for ($column=0; $column<3; $column++) {
        $number=$matrix[$row][$column];
        $allTotal=$allTotal+$number;
        if ($number%2==0) $evenTotal=$evenTotal+$number;
        else $oddTotal=$oddTotal+$number;
    }
}

echo "<div class='result'><b>Odd total:</b> $oddTotal</div>";
echo "<div class='result'><b>Even total:</b> $evenTotal</div>";

echo "<h3>Row Totals</h3>";
for ($row=0; $row<3; $row++) {
    $rowTotal=0;
    for ($column=0; $column<3; $column++)
        $rowTotal=$rowTotal+$matrix[$row][$column];
    echo "<div class='result'><b>Row ".($row+1).":</b> $rowTotal</div>";
}

echo "<h3>Column Totals</h3>";
for ($column=0; $column<3; $column++) {
    $columnTotal=0;
    for ($row=0; $row<3; $row++)
        $columnTotal=$columnTotal+$matrix[$row][$column];
    echo "<div class='result'><b>Column ".($column+1).":</b> $columnTotal</div>";
}

$firstDiagonal=0;
$secondDiagonal=0;
for ($i=0; $i<3; $i++) {
    $firstDiagonal=$firstDiagonal+$matrix[$i][$i];
    $secondDiagonal=$secondDiagonal+$matrix[$i][2-$i];
}

echo "<div class='result'><b>First diagonal:</b> $firstDiagonal</div>";
echo "<div class='result'><b>Second diagonal:</b> $secondDiagonal</div>";
echo "<div class='result'><b>Total of all elements:</b> $allTotal</div>";

$minimum=$matrix[0][0];
$maximum=$matrix[0][0];

for ($row=0; $row<3; $row++) {
    for ($column=0; $column<3; $column++) {
        $number=$matrix[$row][$column];
        if ($number<$minimum) $minimum=$number;
        if ($number>$maximum) $maximum=$number;
    }
}

echo "<div class='result'><b>Minimum:</b> $minimum<br><b>Positions:</b> ";
for ($row=0; $row<3; $row++)
    for ($column=0; $column<3; $column++)
        if ($matrix[$row][$column]==$minimum)
            echo "(Row ".($row+1).", Column ".($column+1).") ";
echo "</div>";

echo "<div class='result'><b>Maximum:</b> $maximum<br><b>Positions:</b> ";
for ($row=0; $row<3; $row++)
    for ($column=0; $column<3; $column++)
        if ($matrix[$row][$column]==$maximum)
            echo "(Row ".($row+1).", Column ".($column+1).") ";
echo "</div>";
?>
</div>

<div class="question">
<h2>Question 4: Student Information</h2>
<?php
$students = array(
    array("ID"=>"CA221","Name"=>"Mohamed Ahmed Ali","Phone"=>"0648440403","Address"=>"Laba Dhagax, Wardhiigley"),
    array("ID"=>"CA223","Name"=>"Ahmed Abdi Jama","Phone"=>"0647223201","Address"=>"Taleex, Hodan"),
    array("ID"=>"CA221","Name"=>"Amina Nur Adan","Phone"=>"0646990276","Address"=>"Macmacaanka, Dharkeynley")
);
?>
<table>
<tr><th>ID</th><th>Name</th><th>Phone</th><th>Address</th></tr>
<?php
foreach ($students as $student) {
    echo "<tr>";
    echo "<td>".$student["ID"]."</td>";
    echo "<td>".$student["Name"]."</td>";
    echo "<td>".$student["Phone"]."</td>";
    echo "<td>".$student["Address"]."</td>";
    echo "</tr>";
}
?>
</table>
</div>

<div class="question">
<h2>Question 5: Student Transcript</h2>
<?php
$transcript = array(
    "Semester 1" => array(
        "subject1" => array("CW1"=>9,"MidTerm"=>26,"CW2"=>10,"Final"=>40,"Total"=>85,"Status"=>"Pass"),
        "subject2" => array("CW1"=>9,"MidTerm"=>26,"CW2"=>10,"Final"=>40,"Total"=>85,"Status"=>"Pass"),
        "subject3" => array("CW1"=>9,"MidTerm"=>26,"CW2"=>10,"Final"=>40,"Total"=>85,"Status"=>"Pass")
    ),
    "Semester 2" => array(
        "subject1" => array("CW1"=>9,"MidTerm"=>26,"CW2"=>10,"Final"=>0,"Total"=>45,"Status"=>"Fail"),
        "subject2" => array("CW1"=>9,"MidTerm"=>26,"CW2"=>10,"Final"=>40,"Total"=>85,"Status"=>"Pass"),
        "subject3" => array("CW1"=>9,"MidTerm"=>26,"CW2"=>10,"Final"=>40,"Total"=>85,"Status"=>"Pass")
    )
);
?>
<table>
<tr><th>Semester</th><th>Course</th><th>CW1</th><th>MidTerm</th><th>CW2</th><th>Final</th><th>Total</th><th>Status</th></tr>
<?php
foreach ($transcript as $semester => $courses) {
    foreach ($courses as $course => $marks) {
        echo "<tr>";
        echo "<td>".$semester."</td>";
        echo "<td>".$course."</td>";
        echo "<td>".$marks["CW1"]."</td>";
        echo "<td>".$marks["MidTerm"]."</td>";
        echo "<td>".$marks["CW2"]."</td>";
        echo "<td>".$marks["Final"]."</td>";
        echo "<td>".$marks["Total"]."</td>";
        if ($marks["Status"]=="Pass") echo "<td class='pass'>Pass</td>";
        else echo "<td class='fail'>Fail</td>";
        echo "</tr>";
    }
}
?>
</table>
</div>

<div class="header">
    <p>End of PHP Assignment 2</p>
</div>

</div>
</body>
</html>
