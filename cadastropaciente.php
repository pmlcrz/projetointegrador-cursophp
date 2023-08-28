<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de pacientes</title>
</head>
<body>
    <form method = "post"name = "Paciente"action="">
        <label>Nomeesobrenome</label>
        <input type="text" nome = "nome" varchar="100">
        <label>CPF</label>
        <input type="text" cpf = "cpf" varchar="15">
        <label>Endereço</label>
        <input type="text" endereço = "endereço" varchar="150">
        <label>RG</label>
        <input type="text" RG = "RG" varchar="15">
        <label>Data</label>
        <input type="date" data = "data" varchar="">
        <label>Telefone</label>
        <input type="text" telefone = "telefone" varchar="12">
        <label>Email</label>
        <input type="text" email = "email" varchar="50">
        <label>Numerocartaosus</label>
        <input type="text" numerocartaosus = "numerocartaosus" varchar="30">
        
        <label>Equipe</label>
        <select>
        <option value="asteca">Asteca</option>
        <option value="dumont">Dumont</option>
  <option value="veteranos" selected>Veteranos</option>
  <option value="forças do amanhã">Força do amanhã</option>
</select>

        <label>Nomemae</label>
        <input type="text" nomemae = "nomemae" varchar="100">
        <label>Nomepae</label>
        <input type="text" nomepae = "nomepae" varchar="100">
        <label>raça</label>
        <input type="text" raca = "raca" varchar="50">
        <label>Sexo</label>
               <select>
        <option value="feminino">feminino</option>
        <option value="masculino">masculino</option>
  <option value="outro" selected>outro</option>
</select>
        
        <label>Tiposanguineo</label>
        <input type="text" tiposanguineo = "tiposanguineo" varchar="5">
        <label>Nacionalidade</label>
        <input type="text" nacionalidade = "nacionalidade" varchar="">
        <label>Statuspac</label>
<select>
        <option value="ativo">ativo</option>
        <option value="inativo">inativo</option>
  
</select>        <label>Doencapreexistente</label>
        <input type="radio" name="doencapreexis" value="sim"/> Sim<br />
        <input type="radio" name="doencapreexis" value="nao"/> Não<br />
        <label>Se sim, qual?</label>
        <input type="text" doencapreexis_qual="doencapreexis_qual" varchar="5">
        <br>
        <input type = submit name"salvar" value="Enviar">













    
</body>
</html>

