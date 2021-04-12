<?php
  $title = 'Settings';
  include 'views/header.php';
  include 'models/settings.php';

  $settingsModel = new Settings ();
  $dbConnection = Database::connect();

  $result=$settingsModel->fetchAll($dbConnection);

  Database::close($dbConnection);

  if ($result->num_rows > 0) {
    include 'views/settings.php';
    $settingsView = new Settings_View ();
    $settingsView->print($result);
  }

  include 'views/footer.php';
?>
