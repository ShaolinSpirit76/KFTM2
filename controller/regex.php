<?php

// Pour permettre la regex sur des champs non requis, il faut ajouter "ou saisie vide" : (^$)

$regexName = " /^[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç']{2,17}[- ]?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç]{0,17}$/ ";

$regexDate = " /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\g1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\g2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\g3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\g4(?:(?:1[6-9]|[2-9]\d)?\d{2})|(^$)$/ ";

$regexMail = " /^[^\W][a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9_]+(\.[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ";

$regexPhone = " /^[+][3]{2}[1-9]([-. ]?)(([0-9]{2})\g1([0-9]{2}))(\g1([0-9]{2})){2}|[0][1-9]([-. ]?)(([0-9]{2})\g7([0-9]{2}))(\g7([0-9]{2})){2}|(^$)$/ ";

$regexLogin = " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}|[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç'0-9]{2,17}[- ]?[a-zA-ZéèÉÈôîêûÛÊÔÎùÙïöëüËÏÖÜç0-9]{0,17}$/ ";

// Le mot de passe devra faire entre 8 et 15 caractères, contenant au moins une minuscule et une majuscule, ainsi qu'un chiffre et un caractère spécial.
$regexPassword = " /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_.])([-.+!*$@%_\w]{8,15})$/ ";


