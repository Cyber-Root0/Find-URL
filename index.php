<html>
    <head>
        <meta charset="UTF-8">
        <title>WebLinks Consulta| by: Cyber</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    </head>
    <body>
        <center>
            <h4>Weblinks | W4Y | Cyber Intelligence</h4>
            <form action="" method="POST">
                <input type="text" name="url" placeholder="Digite a Url" style="text-align:center"><br>
                <input type="submit" value="Consultar">
                
    
            </form>
            <?php

            if (!empty($_POST['url'])){
                consulta($_POST['url']);

            }else{
                
            }
            function consulta($str){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch,CURLOPT_URL,"https://api.hackertarget.com/pagelinks/?q=$str");
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
            $json = curl_exec($ch);
            curl_close($ch);

            //tratamento das informações
            $json=explode("\n",$json);
            $qtd_line=count($json);

            //criação da Tabela
            echo "
                 <h5>Informações de Links | Server</h5>
                <table class='bordered striped centered highlight responsive-table'>
                    
                    <tr>
                        <th style='text-align:center'>ID</th>
                        <th style='text-align:center'>Links</th>
                    </tr>
            ";
            //laço for para implementação de dados
            for($i=0;$i<$qtd_line;$i++){
                echo "
                <tr>
                    <td>$i</td>
                    <td>$json[$i]</td>
                </tr>
                ";


            }
            echo "
            </table>
            
            ";

            
            }

            
            ?>  
        </center>

    </body>
</html>