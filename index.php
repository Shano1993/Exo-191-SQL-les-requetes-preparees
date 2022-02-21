<?php

/**
 * Reprenez le code de l'exercice précédent et transformez vos requêtes pour utiliser les requêtes préparées
 * la méthode de bind du paramètre et du choix du marqueur de données est à votre convenance.
 */


/**
 * Pour cet exercice, vous allez utiliser la base de données table_test_php créée pendant l'exo 189
 * Vous utiliserez également les deux tables que vous aviez créées au point 2 ( créer des tables avec PHP )
 */

try {
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'table_test_php';

    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stm1 = $pdo->prepare("
        INSERT INTO user (name, firstname, email, password, adress, postal_code, country)
        VALUES (:name, :firstname, :email, :password, :adress, :postal_code, :country)
    ");

    $stm1->execute([
        ':name' => 'Hanotiau',
        ':firstname' => 'Stefan',
        ':email' => 'stefan.hanotiau@hotmail.com',
        ':password' => 'azerty001!',
        ':adress' => 'Chemin de la Potelle 6',
        ':postal_code' => '6592',
        ':country' => 'Monceau-Imbrechies',
    ]);

    $stm2 = $pdo->prepare("
        INSERT INTO product (title, price, short_description, long_description)
        VALUES (:title, :price, :short_description, :long_description)
    ");

    $stm2->execute([
        ':title' => 'Mon super titre',
        ':price' => 2.88,
        ':short_description' => 'Ma courte description',
        ':long_description' => 'Ma longue description',
    ]);

    echo 'Utilisateur ajouté';

} catch (Exception $exception) {
    echo $exception->getMessage();
}