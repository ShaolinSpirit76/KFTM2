<?php
setlocale(LC_ALL, 'fr_FR.UTF8');
$actualMonth = date('m');
$actualYear = date('Y');
$daysInWeek = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
if (isset($_POST['month']) AND isset($_POST['year'])) :
    $month = $_POST['month'];
    $year = $_POST['year'];
else :
    $month = $actualMonth;
    $year = $actualYear;
endif;


// On initialise la variable ci-dessous avec la fonction cal_days_in_month qui permet de retourner le nombre de jours dans un mois, en prenant en paramètre l'année et le mois
$numberDayInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
// On initialise la variable ci-dessous avec la fonction date et le paramètre N qui permet de retourner le 1er jour du mois 
$firstDayOfTheMonth = date('N', mktime(0, 0, 0, $month, 1, $year));
$actualMonth = date('N');
