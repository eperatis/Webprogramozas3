<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active mt-2 mt-lg-0">
                  <a class="nav-link" href="#">Kezdőlap <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('students')?>">Diákok</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('teachers')?>">Tanárok</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('documents')?>">Dokumentumok</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Új hozzáadása
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url('students/insert')?>">Diák</a>
                    <a class="dropdown-item" href="<?php echo base_url('teachers/insert')?>">Tanár</a>
                    <a class="dropdown-item" href="<?php echo base_url('documents/insert')?>">Dokumentum</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
              </ul>
            </div>
          </nav>