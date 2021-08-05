 <?php
         $username = 'vhjmuogwqmldtg';
                                $password = '2bbdb436b2188ff48760b1366c2e17d9d8eb93d695f9a83c3d31bd7e7e093eb4';

                                try {
                                    $conn = new PDO('pgsql:host=ec2-54-163-97-228.compute-1.amazonaws.com;dbname=d9ejdo53669jjr', $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $data = $conn->query('
                                                    create_function(args, code) datavenda,descontototal,descontoacerto,valortotal
                                                        FROM venda ORDER BY idvenda DESC LIMIT 1');

                                    foreach($data as $row) {

                                         echo  '<li>Venda realizada data da venda'.$row['datavenda'].'</li>';
                                         echo  '<li>desconto total - '.$row['descontototal'].'</li>';
                                         echo  '<li>desconto acerto - '.$row['descontoacerto'].'</li>';
                                         echo  '<li>valor total  - '.$row['valortotal'].'</li>';



                                    }
                                } catch(PDOException $e) {
                                    echo 'ERROR: ' . $e->getMessage();
                                }
   
           
        ?>