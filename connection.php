<?php
    $conn = pg_connect("postgres://thrrzgwslydqii:4db6d5758b42874a2f1342dd754b3441d3fa00255415a7d7eb35c3d0a685e201@ec2-54-226-56-198.compute-1.amazonaws.com:5432/d2hgkknu6p6pgi");
    if (!$conn) {
        die("Connection failed");
    }
?>