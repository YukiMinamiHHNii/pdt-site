<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="layout/style.css">
  <title>Index</title>
</head>
<body>
  <header class="navbar">
    <nav class="indigo">
      <div class="nav-wrapper container">
      <a href="index" class="brand-logo">Logo</a>
      <a href="#" data-activates="mobile-demo" class="dropdown-button button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="pokedex">Pokédex</a></li>
          <li><a href="movedex">Moves</a></li>
          <li><a href="abilitydex">Abilities</a></li>
          <li><a href="formatdex">Formats</a></li>
          <li><a href="comments">Comments</a></li>
          <li><a class='dropdown-button' href='#' data-activates='dropdown1'>Session</a></li>
      </ul>
      <ul id="mobile-demo" class="dropdown-content">
        <li><a href="pokedex">Pokédex</a></li>
        <li><a href="movedex">Moves</a></li>
        <li><a href="abilitydex">Abilities</a></li>
        <li><a href="formatdex">Formats</a></li>
        <li><a href="comments">Comments</a></li>
        <?php if(!$session){?>
        <li><a href="register">Register</a></li>
        <li><a href="login">Login</a></li>
      <?php }else{?>
        <li><a href="logout">Logout</a></li>
      <?php }?>
      </ul>
      </div>
      <ul id='dropdown1' class='dropdown-content'>
        <?php if(!$session){?>
        <li><a href="register">Register</a></li>
        <li><a href="login">Login</a></li>
      <?php }else{?>
        <li><a href="logout">Logout</a></li>
      <?php }?>
      </ul>
    </header>
  <main>
