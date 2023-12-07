<?php
                $page = $_GET['page'] ?? 'usersCV';
                $filename = $page . '.php';
                if (file_exists($filename)) {
                    include $filename;
                } else {
                    echo "Page not found.";
                }
?> 
