<?php
//    Condition qui permet de vérifier si les valeurs month et year ont été renseignées
//        Fonction qui permet d'affilier les données d'une page php externe à l'index
require '../../controller/calendarController.php';

?>
        <form method="post" action="index.php">

            <label for="month">Mois : </label>
            <select name="month">
                <option value="" disabled selected></option>
                <option value="1" <?= ($month == 1) ? 'selected' : ''; ?>>01-Janvier</option>
                <option value="2" <?= ($month == 2) ? 'selected' : ''; ?>>02-Février</option>
                <option value="3" <?= ($month == 3) ? 'selected' : ''; ?>>03-Mars</option>
                <option value="4" <?= ($month == 4) ? 'selected' : ''; ?>>04-Avril</option>
                <option value="5" <?= ($month == 5) ? 'selected' : ''; ?>>05-Mai</option>
                <option value="6" <?= ($month == 6) ? 'selected' : ''; ?>>06-Juin</option>
                <option value="7" <?= ($month == 7) ? 'selected' : ''; ?>>07-Juillet</option>
                <option value="8" <?= ($month == 8) ? 'selected' : ''; ?>>08-Août</option>
                <option value="9" <?= ($month == 9) ? 'selected' : ''; ?>>09-Septembre</option>
                <option value="10" <?= ($month == 10) ? 'selected' : ''; ?>>10-Octobre</option>
                <option value="11" <?= ($month == 11) ? 'selected' : ''; ?>>11-Novembre</option>
                <option value="12" <?= ($month == 12) ? 'selected' : ''; ?>>12-Décembre</option>
            </select>

            <label for="year">Année : </label>
            <select name="year">
                <option value="" disabled selected></option>
                <?php
//            la boucle ci-dessous permet d'afficher les années de 2019 à 2070
                for ($yearMin = 2019; $yearMin <= 2070; $yearMin++) :
                    ?>
                    <option value="<?= $yearMin; ?>" <?= ($year == $yearMin) ? 'selected' : ''; ?>><?= $yearMin; ?></option>
                    <?php
                endfor;
                ?>
            </select>
            <button type="submit">Envoyer</button>
        </form>

        <h1 class="text-center"><?php echo ucfirst(strftime('%B-%Y', mktime(0, 0, 0, $month, 1, $year))); ?></h1>
        <table class="table table-bordered">
            <thead>
                <?php
// Boucle qui parcourt le tableau daysInWeek et retranscris la valeur day correspondante dans le th
                foreach ($daysInWeek as $day) :
                    ?>
                <th scope="col"><?= $day; ?></th> <?php endforeach; ?>
        </thead><?php
        $outsideDayOfTheMonth = 1;
        $date = 1;
// Boucle qui affiche une ligne de tableau supplémentaire tant qu'on n'a pas dépassé le nombre de jours du mois
        while ($date <= $numberDayInMonth):
            ?> <tr scope="row"> <?php
// Boucle qui crée 7 colonnes en fonction du nombre de jours dans la semaine
                for ($i = 1; $i <= 7; $i++) :
// Condition qui permet d'afficher les cellules en fonction du nombre de jours dans le mois et de griser les autres
                    if ($outsideDayOfTheMonth < $firstDayOfTheMonth || $date > $numberDayInMonth) :
                        $outsideDayOfTheMonth++;
                        ?>
                        <!-- On crée une cellule vide si le jour ne fait pas parti du mois sélectionné  -->
                        <td></td>
                        <?php
// On crée une cellule avec la date du jour s'il fait bien parti du mois sélectionné
                    else :
// En plus d'afficher la date du jour, on l'incrémente pour passer au jour suivant
                        ?> <td class="col-1"> <?= $date++; ?> </td>
                    <?php
                    endif;
                endfor;
                ?>
            </tr>
            <?php
        endwhile;
        ?>
    </table>
