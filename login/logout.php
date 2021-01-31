<?php

session_start();
session_destroy();

die("Logout erfolgreich. <a href='../login'>Zum Login</a>");
