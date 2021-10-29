<!DOCTYPE html>
<?php 
   include_once "conf/default.inc.php";
   require_once "conf/Conexao.php";
   $title = "Lista de Vendas";
   $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
   $consulta = isset($_POST["consulta"]) ? $_POST["consulta"] : "1";
?>
<html>
<head>
<meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <form method="post">
    <fieldset>
			<legend>Consulta</legend>
		<input type="radio" name="consulta" id="consulta" value= 1 <?php if($consulta == 1) echo "checked"; ?>>nome 
		<input type="radio" name="consulta" id="consulta" value= 2  <?php if($consulta == 2) Echo "checked"; ?>>id 
		<input type="radio" name="consulta" id="consulta" value= 3 <?php if($consulta == 3) echo "cheched"; ?>>fixo 	
		</fieldset>
    <fieldset>
        <legend>Procurar Vendedores</legend>
        <input type="text"   name="procurar" id="procurar" size="37" value="" <?php echo $procurar;?>>
        <input type="submit" name="acao"     id="acao">
        <br><br>
        <table>
	    <tr><td><b>ID</b></td><td><b>Nome</b></td> <td><b>Janeiro</b></td><td><b>Fevereiro</b></td><td><b>Março</b></td><td><b>Abril</b></td><td><b>Maio</b></td><td><b>Junho</b></td><td><b>Julho</b></td><td><b>Agosto</b></td><td><b>Setembro</b></td><td><b>Outubro</b></td><td><b>Novembro</b></td><td><b>Dezembro</b></td><td><b>Fixo</b></td><td><b>Contratação</b></td> <td><b>Tempo de Empresa</b></td> <td><b>Bonus</b></td> <td><b>Comissão</b></td> <td><b>Total</b></td> </tr>
        <?php
        
        if ($consulta == 1) {
            $pdo = Conexao::getInstance(); 
            $consultar = $pdo->query("SELECT * FROM vendas 
                                     WHERE nome LIKE '$procurar%' 
                                     ORDER BY id");
            while ($linha = $consultar->fetch(PDO::FETCH_ASSOC)) { 
                $total = ($linha['janeiro'] + $linha['fevereiro'] + $linha['março'] + $linha['abril']+ $linha['maio'] + $linha['junho'] + $linha['julho']+ $linha['agosto'] + $linha['setembro'] + $linha['outubro']+ $linha['novembro'] + $linha['dezembro']*1 );
        $hoje = date("Y");
        $contr = date("Y",strtotime($linha['datacontratacao']));
        $comissao = (36%$total);
        $bonus = (50.00*$contr);
        $resultado = "";
        if ($linha['janeiro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['janeiro'] <= 5000) {
            $class = "red";
        }
        if ($linha['fevereiro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['fevereiro'] <= 5000) {
            $class = "red";
        }
        if ($linha['março'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['março'] <= 5000) {
            $class = "red";
        }
        if ($linha['abril'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['abril'] <= 5000) {
            $class = "red";
        }
        if ($linha['maio'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['maio'] <= 5000) {
            $class = "red";
        }
        if ($linha['junho'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['junho'] <= 5000) {
            $class = "red";
        }
        if ($linha['julho'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['julho'] <= 5000) {
            $class = "red";
        }
        if ($linha['agosto'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['agosto'] <= 5000) {
            $class = "red";
        }
        if ($linha['setembro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['setembro'] <= 5000) {
            $class = "red";
        }
        if ($linha['outubro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['outubro'] <= 5000) {
            $class = "red";
        }
        if ($linha['novembro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['novembro'] <= 5000) {
            $class = "red";
        }
        if ($linha['dezembro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['dezembro'] <= 5000) {
            $class = "red";
        }

        if ($contr >= 10) { 
            $class = "old";
        }
            
        ?>
	    <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['janeiro'];?></td>
            <td><?php echo $linha['fevereiro'];?></td>
            <td><?php echo $linha['março'];?></td>
            <td><?php echo $linha['abril'];?></td>
            <td><?php echo $linha['maio'];?></td>
            <td><?php echo $linha['junho'];?></td>
            <td><?php echo $linha['julho'];?></td>
            <td><?php echo $linha['agosto'];?></td>
            <td><?php echo $linha['setembro'];?></td>
            <td><?php echo $linha['outubro'];?></td>
            <td><?php echo $linha['novembro'];?></td>
            <td><?php echo $linha['dezembro'];?></td>
            <td><?php echo $linha['fixo'];?></td>
            <td><?php echo $linha['datacontratacao'];?></td>
            <td class="<?php echo $class;?>"><?php echo $resultado;?></td>
            <td><?php echo $hoje - $contr;?></td>
            <td><?php echo $bonus;?></td>
            <td><?php echo $comissao;?></td>
            <td><?php echo $total;?></td>
            
            
        </tr>
        <?php }}elseif ($consulta == 2) {
            $pdo = Conexao::getInstance(); 
            $consultar = $pdo->query("SELECT * FROM vendas 
                                     WHERE id = '$procurar' 
                                     ORDER BY id");
            while ($linha = $consultar->fetch(PDO::FETCH_ASSOC)) { 
                $total = ($linha['janeiro'] + $linha['fevereiro'] + $linha['março'] + $linha['abril']+ $linha['maio'] + $linha['junho'] + $linha['julho']+ $linha['agosto'] + $linha['setembro'] + $linha['outubro']+ $linha['novembro'] + $linha['dezembro']*1 );
                $hoje = date("Y");
                $contr = date("Y",strtotime($linha['datacontratacao']));
        $comissao = (36%$total);
        $bonus = (50.00*$contr);
        $resultado = "";
        if ($linha['janeiro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['janeiro'] <= 5000) {
            $class = "red";
        }
        if ($linha['fevereiro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['fevereiro'] <= 5000) {
            $class = "red";
        }
        if ($linha['março'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['março'] <= 5000) {
            $class = "red";
        }
        if ($linha['abril'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['abril'] <= 5000) {
            $class = "red";
        }
        if ($linha['maio'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['maio'] <= 5000) {
            $class = "red";
        }
        if ($linha['junho'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['junho'] <= 5000) {
            $class = "red";
        }
        if ($linha['julho'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['julho'] <= 5000) {
            $class = "red";
        }
        if ($linha['agosto'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['agosto'] <= 5000) {
            $class = "red";
        }
        if ($linha['setembro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['setembro'] <= 5000) {
            $class = "red";
        }
        if ($linha['outubro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['outubro'] <= 5000) {
            $class = "red";
        }
        if ($linha['novembro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['novembro'] <= 5000) {
            $class = "red";
        }
        if ($linha['dezembro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['dezembro'] <= 5000) {
            $class = "red";
        }

        if ($contr >= 10) { 
            $class = "old";
        }
            
        ?>
	    <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['janeiro'];?></td>
            <td><?php echo $linha['fevereiro'];?></td>
            <td><?php echo $linha['março'];?></td>
            <td><?php echo $linha['abril'];?></td>
            <td><?php echo $linha['maio'];?></td>
            <td><?php echo $linha['junho'];?></td>
            <td><?php echo $linha['julho'];?></td>
            <td><?php echo $linha['agosto'];?></td>
            <td><?php echo $linha['setembro'];?></td>
            <td><?php echo $linha['outubro'];?></td>
            <td><?php echo $linha['novembro'];?></td>
            <td><?php echo $linha['dezembro'];?></td>
            <td><?php echo $linha['fixo'];?></td>
            <td><?php echo $linha['datacontratacao'];?></td>
            <td class="<?php echo $class;?>"><?php echo $resultado;?></td>
            <td><?php echo $hoje - $contr;?></td>
            <td><?php echo $bonus;?></td>
            <td><?php echo $comissao;?></td>
            <td><?php echo $total;?></td>
            
	    </tr>
        <?php }}elseif ($consulta == 3) {
            $pdo = Conexao::getInstance(); 
            $consultar = $pdo->query("SELECT * FROM vendas 
                                     WHERE fixo Like '$procurar%' 
                                     ORDER BY id");
            while ($linha = $consultar->fetch(PDO::FETCH_ASSOC)) { 
                $total = ($linha['janeiro'] + $linha['fevereiro'] + $linha['março'] + $linha['abril']+ $linha['maio'] + $linha['junho'] + $linha['julho']+ $linha['agosto'] + $linha['setembro'] + $linha['outubro']+ $linha['novembro'] + $linha['dezembro']*1 );
                $hoje = date("Y");
                $contr = date("Y",strtotime($linha['datacontratacao']));
        $comissao = (36%$total);
        $bonus = (50.00*$contr);
        $resultado = $class = "";
        if ($linha['janeiro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['janeiro'] <= 5000) {
            $class = "red";
        }
        if ($linha['fevereiro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['fevereiro'] <= 5000) {
            $class = "red";
        }
        if ($linha['março'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['março'] <= 5000) {
            $class = "red";
        }
        if ($linha['abril'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['abril'] <= 5000) {
            $class = "red";
        }
        if ($linha['maio'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['maio'] <= 5000) {
            $class = "red";
        }
        if ($linha['junho'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['junho'] <= 5000) {
            $class = "red";
        }
        if ($linha['julho'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['julho'] <= 5000) {
            $class = "red";
        }
        if ($linha['agosto'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['agosto'] <= 5000) {
            $class = "red";
        }
        if ($linha['setembro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['setembro'] <= 5000) {
            $class = "red";
        }
        if ($linha['outubro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['outubro'] <= 5000) {
            $class = "red";
        }
        if ($linha['novembro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['novembro'] <= 5000) {
            $class = "red";
        }
        if ($linha['dezembro'] >= 10000) { 
            $class = "blue";
        }elseif ($linha['dezembro'] <= 5000) {
            $class = "red";
        }

        if ($contr >= 10) { 
            $class = 'old';
        }
            
        ?>
	    <tr><td><?php echo $linha['id'];?></td>
            <td><?php echo $linha['nome'];?></td>
            <td><?php echo $linha['janeiro'];?></td>
            <td><?php echo $linha['fevereiro'];?></td>
            <td><?php echo $linha['março'];?></td>
            <td><?php echo $linha['abril'];?></td>
            <td><?php echo $linha['maio'];?></td>
            <td><?php echo $linha['junho'];?></td>
            <td><?php echo $linha['julho'];?></td>
            <td><?php echo $linha['agosto'];?></td>
            <td><?php echo $linha['setembro'];?></td>
            <td><?php echo $linha['outubro'];?></td>
            <td><?php echo $linha['novembro'];?></td>
            <td><?php echo $linha['dezembro'];?></td>
            <td><?php echo $linha['fixo'];?></td>
            <td><?php echo $linha['datacontratacao'];?></td>
            <td class="<?php echo $class;?>"><?php echo $resultado;?></td>
            <td><?php echo $hoje - $contr;?></td>
            <td><?php echo $bonus;?></td>
            <td><?php echo $comissao;?></td>
            <td><?php echo $total;?></td>
            
	    </tr>
        <?php }} ?>       
        </table>
    </fieldset>
    </form>
</body>
</html>
